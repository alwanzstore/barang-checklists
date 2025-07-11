<?php

namespace App\Filament\Resources\LokasiPindahanResource\Pages;

use App\Filament\Resources\LokasiPindahanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLokasiPindahan extends CreateRecord
{
    protected static string $resource = LokasiPindahanResource::class;

    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}

}
