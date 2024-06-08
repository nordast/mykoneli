<?php

namespace App\Jobs;

use App\Mail\ContactEmailToAdmin;
use App\Mail\ContactEmailToUser;
use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailContactJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public Contact $contact)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Mail to admin
        Mail::to(config('mail.from.address'))->send(new ContactEmailToAdmin($this->contact));

        // Mail to user
        Mail::to($this->contact->email)->send(new ContactEmailToUser($this->contact));
    }
}
