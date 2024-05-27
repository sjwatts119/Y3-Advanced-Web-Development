<?php

namespace App\Filament\Resources\PropertyListingResource\Pages;

use App\Filament\Resources\PropertyListingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPropertyListing extends EditRecord
{
    protected static string $resource = PropertyListingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
