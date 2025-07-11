<?php

namespace App\Filament\Resources\LokasiPindahanResource\Pages;

use App\Filament\Resources\LokasiPindahanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLokasiPindahans extends ListRecords
{
    protected static string $resource = LokasiPindahanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
