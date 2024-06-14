<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/**
 * @property int $id
 * @property int|null $user_id
 * @property string $key
 * @property string|null $name
 * @property string|null $description
 * @property string|null $answer
 * @property string|null $feedback
 * @property int $status
 * @property string|null $ip
 * @property int $is_spam
 * @property int $likes
 * @property int $dislikes
 * @property int $rating
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class Calculator extends Model
{
    const STATUS_NEW            = 0;
    const STATUS_ACTIVE         = 1;
    const STATUS_PRIVATE        = 2;
    const STATUS_DELETED        = 3;

    const IS_SPAM_NO            = 0;
    const IS_SPAM_YES           = 1;

    protected $table = 'calculator';
    protected $primaryKey = 'key';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'name',
        'description',
    ];

    protected static function booted(): void
    {
        static::creating(function (Calculator $calculator) {
            $calculator->key = Str::random(12);
        });

        static::retrieved(function (Calculator $calculator) {
            $calculator->answer = json_decode($calculator->answer, true);
        });
    }

    public static function getStatuses(int $key = null): array|string
    {
        $result = [
            self::STATUS_NEW      => __('New'),
            self::STATUS_ACTIVE   => __('Active'),
            self::STATUS_PRIVATE  => __('Private'),
            self::STATUS_DELETED  => __('Deleted'),
        ];

        return !is_null($key) ? Arr::get($result, $key) : $result;
    }

    public static function isSpam(int $key = null): array|string
    {
        $result = [
            self::IS_SPAM_NO    => __('No'),
            self::IS_SPAM_YES   => __('Yes'),
        ];

        return !is_null($key) ? Arr::get($result, $key) : $result;
    }
}
