<?php

namespace App\Filament\Resources\LokasiPindahanUserResource\Pages;

use App\Filament\Resources\LokasiPindahanUserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLokasiPindahanUsers extends ListRecords
{
    protected static string $resource = LokasiPindahanUserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
