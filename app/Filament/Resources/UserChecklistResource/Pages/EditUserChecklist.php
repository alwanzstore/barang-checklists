<?php

namespace App\Filament\Resources\UserChecklistResource\Pages;

use App\Filament\Resources\UserChecklistResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUserChecklist extends EditRecord
{
    protected static string $resource = UserChecklistResource::class;

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
