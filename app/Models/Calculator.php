<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
