<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;

/**
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property int $category_id
 * @property string $image
 * @property string $content
 * @property int $status
 * @property array $tags
 * @property string $created_at
 *
 * @property Category $category
 */
class Post extends Model
{
    use HasFactory, SoftDeletes;

    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE   = 1;

    protected $fillable = [
        'title',
        'category_id',
        'image',
        'content',
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
