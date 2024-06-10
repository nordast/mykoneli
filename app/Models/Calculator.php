<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
    use HasFactory;

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
            $calculator->key = Str::random(12);;
        });
    }
}
