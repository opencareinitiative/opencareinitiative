<?php

namespace App\Filament\Resources\People\JobTitlesResource\Pages;

use App\Filament\Resources\People\JobTitlesResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageJobTitles extends ManageRecords
{
    protected static string $resource = JobTitlesResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
