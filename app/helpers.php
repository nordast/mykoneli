<?php

use Illuminate\Support\Carbon;

if (!function_exists('__datetime')) {
    function __datetime(string|int $time, string $format = 'd M, Y H:i:s'): string
    {
        return Carbon::parse($time)->format($format);
    }
}
