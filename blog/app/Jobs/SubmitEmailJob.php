<?php

namespace App\Jobs;

use Illuminate\Support\Facades\Mail;

use App\Mail\FormEmail;

class SubmitEmailJob extends Job
{
protected $details;

    /**
 * Create a new job instance.
 *
 * @return void
 */
public function __construct($details)
{
    $this->details = $details;
}

/**
 * Execute the job.
 *
 * @return void
 */
public function handle()
{
    // $email = new FormEmail($this->details);
    // Mail::to($this->details['email'])->send($email);

    Mail::to($details['email'])->send(new FormEmail($details));
}

}