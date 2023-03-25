<?php

namespace App\Filament\Resources\KandidatResource\Pages;

use App\Filament\Resources\KandidatResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;
use Ramsey\Uuid\Uuid;

class ManageKandidats extends ManageRecords
{
    protected static string $resource = KandidatResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->mutateFormDataUsing(function (array $data): array {
                    $data['kandidat_uuid'] = Uuid::uuid4()->toString();

                    return $data;
                })
                ->successNotificationTitle('Kandidat berhasil dibuat')
                ->failureNotificationTitle('Kandidat gagal dibuat')
            ,
        ];
    }
}
