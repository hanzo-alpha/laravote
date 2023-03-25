<?php

namespace App\Filament\Resources\KandidatResource\Pages;

use App\Filament\Resources\KandidatResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageKandidats extends ManageRecords
{
    protected static string $resource = KandidatResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
