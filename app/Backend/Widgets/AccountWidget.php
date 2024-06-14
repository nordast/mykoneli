<?php

namespace App\Backend\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class AccountWidget extends BaseWidget
{
    protected static ?int $sort = -3;

    protected static string $view = 'backend.widgets.account-widget';

    protected static bool $isLazy = false;

}
