<?php

namespace App\Filament\Resources\UserChecklistResource\Pages;

use App\Filament\Resources\UserChecklistResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUserChecklist extends CreateRecord
{
    protected static string $resource = UserChecklistResource::class;

    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}

}
