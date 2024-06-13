<?php

namespace App\Backend\Resources\PostResource\Pages;

use App\Backend\Resources\PostResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;
}
