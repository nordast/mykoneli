<?php

namespace App\Backend\Resources\CalculatorResource\Pages;

use App\Backend\Resources\CalculatorResource;
use Filament\Resources\Pages\ViewRecord;

class ViewCalculator extends ViewRecord
{
    protected static string $resource = CalculatorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}
