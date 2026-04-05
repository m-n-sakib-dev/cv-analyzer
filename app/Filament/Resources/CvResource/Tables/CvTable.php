<?php

namespace App\Filament\Resources\CvResource\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CvTable
{
    public static function make(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),

                TextColumn::make('cv_path')
                    ->label('CV File')
                    ->formatStateUsing(fn(string $state) => basename($state))
                    ->searchable(),

                TextColumn::make('designations')
                    ->label('Designation')
                    ->default('—'),

                TextColumn::make('ratings')
                    ->label('Rating')
                    ->sortable()
                    ->badge()
                    ->color('success')
                    ->default('—'),

                TextColumn::make('created_at')
                    ->label('Uploaded')
                    ->dateTime('d M Y, H:i'),
            ])
            ->defaultSort('ratings', 'desc');
    }
}
