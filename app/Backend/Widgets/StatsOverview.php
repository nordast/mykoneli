<?php

namespace App\Backend\Widgets;

use App\Models\Contact;
use App\Models\Post;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static bool $isLazy = false;

    protected function getStats(): array
    {
        return [
            Stat::make('Contacts', Contact::count())
                ->url(route('filament.backend.resources.contacts.index'))
                ->icon('heroicon-o-envelope'),

            Stat::make('Posts', Post::count())
                ->url(route('filament.backend.resources.posts.index'))
                ->icon('heroicon-o-newspaper'),

            Stat::make('Users', User::count())
                ->url(route('filament.backend.resources.users.index'))
                ->icon('heroicon-o-users'),
        ];
    }
}
