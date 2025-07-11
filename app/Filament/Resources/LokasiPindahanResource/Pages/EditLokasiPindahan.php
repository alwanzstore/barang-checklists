<?php

namespace App\Filament\Resources\LokasiPindahanResource\Pages;

use App\Filament\Resources\LokasiPindahanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLokasiPindahan extends EditRecord
{
    protected static string $resource = LokasiPindahanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }


    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}

}
