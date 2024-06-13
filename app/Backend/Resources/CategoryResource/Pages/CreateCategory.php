<?php

namespace App\Backend\Resources\CategoryResource\Pages;

use App\Backend\Resources\CategoryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCategory extends CreateRecord
{
    protected static string $resource = CategoryResource::class;
}
