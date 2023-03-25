<?php

namespace App\Filament\Resources\PartaiResource\Pages;

use App\Filament\Resources\PartaiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManagePartais extends ManageRecords
{
    protected static string $resource = PartaiResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
