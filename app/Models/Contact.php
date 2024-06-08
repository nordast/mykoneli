<?php

namespace App\Models;

use App\Jobs\SendEmailContactJob;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $name
 * @property string $email
 * @property string $subject
 * @property string $content
 */
class Contact extends Model
{
    protected $fillable = [
        'name',
        'email',
        'subject',
        'content',
    ];

    protected static function booted(): void
    {
        static::created(function (Contact $contact) {
            dispatch(new SendEmailContactJob($contact));
        });
    }
}
