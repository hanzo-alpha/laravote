<?php

namespace App\Filament\Resources\PartaiResource\Pages;

use App\Filament\Resources\PartaiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;
use Ramsey\Uuid\Uuid;

class ManagePartais extends ManageRecords
{
    protected static string $resource = PartaiResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->mutateFormDataUsing(function (array $data): array {
                    $data['partai_uuid'] = Uuid::uuid4()->toString();

                    return $data;
                })
                ->successNotificationTitle('Partai Berhasil dibuat')
                ->failureNotificationTitle('Partai gagal dibuat')
            ,
        ];
    }
}
