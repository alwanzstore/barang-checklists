<?php

namespace App\Filament\Resources\BarangChecklistResource\Pages;

use App\Filament\Resources\BarangChecklistResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBarangChecklists extends ListRecords
{
    protected static string $resource = BarangChecklistResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
