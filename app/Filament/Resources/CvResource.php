<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CvResource\Pages;
use App\Filament\Resources\CvResource\Schemas\CvSchema;
use App\Filament\Resources\CvResource\Tables\CvTable;
use App\Models\Cv;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class CvResource extends Resource
{
    protected static ?string $model = Cv::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationLabel = 'Manage CV';

    protected static ?string $modelLabel = 'CV';

    public static function form(Schema $schema): Schema
    {
        return $schema->components(CvSchema::fields());
    }

    public static function table(Table $table): Table
    {
        return CvTable::make($table);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListCvs::route('/'),
            'create' => Pages\CreateCv::route('/create'),
        ];
    }
}
