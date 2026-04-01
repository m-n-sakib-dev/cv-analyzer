<?php

namespace App\Filament\Resources\CvResource\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;

class CvSchema
{
    public static function fields(): array
    {
        return [
            TextInput::make('designation')
                ->required()
                ->maxLength(100),
            FileUpload::make('cv_files')
                ->label('Upload CVs')
                ->multiple()
                ->required()
                ->disk('public')
                ->directory('cvs')
                ->acceptedFileTypes([
                    'application/pdf',
                    'application/msword',
                    'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                ])
                ->maxSize(5120)
                ->helperText('Accepted: PDF, DOC, DOCX. Max 5MB each.'),
        ];
    }
}
