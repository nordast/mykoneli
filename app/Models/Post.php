<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE   = 1;

    protected $fillable = [
        'title',
        'category_id',
        'image',
        'text',
        'status',
        'tags',
        'slug',
    ];

    protected $casts = [
        'tags' => 'array',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public static function getStatuses(int $key = null): array|string
    {
        $result = [
            self::STATUS_INACTIVE => __('Inactive'),
            self::STATUS_ACTIVE   => __('Active'),
        ];

        return !is_null($key) ? Arr::get($result, $key) : $result;
    }
}
