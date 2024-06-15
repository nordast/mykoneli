<?php

use Illuminate\Support\Carbon;

if (!function_exists('__date')) {
    function __date(string|int $time, string $format = 'M d, Y'): string
    {
        return Carbon::parse($time)->format($format);
    }
}

if (!function_exists('__datetime')) {
    function __datetime(string|int $time, string $format = 'M d, Y H:i:s'): string
    {
        return Carbon::parse($time)->format($format);
    }
}
