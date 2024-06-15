<?php

namespace App\Backend\Filters;

use Carbon\Carbon;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\Concerns\CanSpanColumns;
use Filament\Tables\Filters\Concerns\HasColumns;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\Indicator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class DateFilter
{
    use HasColumns;
    use CanSpanColumns;

    public static function make(?string $name = null): Filter
    {
        list($subName) = explode('_', $name);

        return Filter::make($name)
            ->form([
                DatePicker::make($subName . '_from')->maxDate(now())->label(Str::ucfirst($subName) . ' From'),
                DatePicker::make($subName . '_until')->maxDate(now())->label(Str::ucfirst($subName) . ' Until'),
            ])
            ->query(function (Builder $query, array $data) use ($name, $subName): Builder {
                return $query
                    ->when(
                        $data[$subName . '_from'],
                        fn (Builder $query, $date): Builder => $query->whereDate($name, '>=', $date),
                    )
                    ->when(
                        $data[$subName . '_until'],
                        fn (Builder $query, $date): Builder => $query->whereDate($name, '<=', $date),
                    );
            })
            ->indicateUsing(function (array $data) use ($name, $subName): array {
                $indicators = [];

                if ($data[$subName . '_from'] ?? null) {
                    $indicators[] = Indicator::make( Str::ucfirst($subName) . ' From ' . Carbon::parse($data[$subName . '_from'])
                        ->toFormattedDateString())
                        ->removeField($subName . '_from');
                }

                if ($data[$subName . '_until'] ?? null) {
                    $indicators[] = Indicator::make(Str::ucfirst($subName) . ' Until ' . Carbon::parse($data[$subName . '_until'])
                        ->toFormattedDateString())
                        ->removeField($subName . '_until');
                }

                return $indicators;
            });
    }


}
