<?php

namespace App\Filament\Resources\People\VacanciesResource\Pages;

use App\Filament\Resources\People\VacanciesResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVacancies extends ListRecords
{
    protected static string $resource = VacanciesResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
