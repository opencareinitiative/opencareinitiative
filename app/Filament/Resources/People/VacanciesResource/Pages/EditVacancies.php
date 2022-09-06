<?php

namespace App\Filament\Resources\People\VacanciesResource\Pages;

use App\Filament\Resources\People\VacanciesResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVacancies extends EditRecord
{
    protected static string $resource = VacanciesResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
