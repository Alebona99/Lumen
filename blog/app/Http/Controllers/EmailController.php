<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Queue;
use App\Jobs\SubmitEmailJob;
use Illuminate\Support\Facades\Mail;
use App\Mail\FormEmail;

class EmailController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    //prova mail
    public function email(){
        $details = [
            'name'    => ('Alessio'), 
            'email'   => ('alexiobona99@gmail.com'),
        ];

        Mail::to($details['email'])->send(new FormEmail($details));

        //adding email confirmation to queue
        //Queue::push(new SubmitEmailJob($details));
        return response()->json('email push');
    }
}