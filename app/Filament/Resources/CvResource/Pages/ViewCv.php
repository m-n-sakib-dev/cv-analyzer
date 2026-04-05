<?php

namespace App\Filament\Resources\CvResource\Pages;

use App\Filament\Resources\CvResource;
use Filament\Resources\Pages\ViewRecord;

class ViewCv extends ViewRecord
{
    protected static string $resource = CvResource::class;

    protected  string $view = 'filament.resources.cv-resource.pages.view-cv';
}
