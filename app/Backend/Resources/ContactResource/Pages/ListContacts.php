<?php

namespace App\Backend\Resources\ContactResource\Pages;

use App\Backend\Resources\ContactResource;
use Filament\Resources\Pages\ListRecords;

class ListContacts extends ListRecords
{
    protected static string $resource = ContactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}
