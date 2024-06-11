<?php

namespace App\Backend\Resources\ContactResource\Pages;

use App\Backend\Resources\ContactResource;
use Filament\Resources\Pages\ViewRecord;

class ViewContact extends ViewRecord
{
    protected static string $resource = ContactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}
