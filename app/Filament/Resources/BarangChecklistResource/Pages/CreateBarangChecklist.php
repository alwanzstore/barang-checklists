<?php

namespace App\Filament\Resources\BarangChecklistResource\Pages;

use App\Filament\Resources\BarangChecklistResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBarangChecklist extends CreateRecord
{
    protected static string $resource = BarangChecklistResource::class;

    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}

}
