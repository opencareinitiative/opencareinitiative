<?php

namespace App\Filament\Resources\Core\LocationsResource\Pages;

use App\Filament\Resources\Core\LocationsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageLocations extends ManageRecords
{
    protected static string $resource = LocationsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
