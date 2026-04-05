<?php

namespace App\Filament\Resources\CvResource\Pages;

use Filament\Notifications\Notification;
use App\Filament\Resources\CvResource;
use App\Models\Cv;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;


class CreateCv extends CreateRecord
{
    protected static string $resource = CvResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        set_time_limit(220);
        // Delete all existing CV records before adding new ones
        Cv::truncate();
        $files = $data['cv_files'] ?? [];
        $lastRecord = null;

        foreach ($files as $filePath) {
            $rating      = null;
            $designation = $data['designation'];

            $fullPath = storage_path('app/public/' . $filePath);
            $fullPath = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $fullPath);

            $baseUrl = config('services.ai_cv_analyzer.url');

            $response = Http::post($baseUrl . '/analyze-cv', [
                'file_path' => $fullPath,
                'position'  => $designation,
            ]);


            if ($response->successful()) {
                $aiData      = $response->json('data');
                $rating = $aiData['rating'];
                $lastRecord = Cv::create([
                    'cv_path'      => $filePath,
                    'ratings'      => $rating,
                    'designations' => $designation,
                ]);
            } else {

                Notification::make()
                    ->title('AI Analysis Failed')
                    ->danger()
                    ->body('Error analyzing file: ' . basename($filePath) . '. ' . $response)
                    ->send();

                throw ValidationException::withMessages([
                    'cv_files' => 'Could not analyze some CVs. Please check the API.',
                ]);
            }
        }

        return $lastRecord ?? new Cv();
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
