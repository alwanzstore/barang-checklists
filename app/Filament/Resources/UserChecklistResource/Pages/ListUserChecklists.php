<?php

namespace App\Filament\Resources\UserChecklistResource\Pages;

use App\Filament\Resources\UserChecklistResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUserChecklists extends ListRecords
{
    protected static string $resource = UserChecklistResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
