<?php

namespace App\Http\Controllers;

use App\Jobs\HelloJob;
use App\Models\User;

use Illuminate\Support\Facades\Queue;


// Ciao
class HelloController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void 
     */
    public function __construct()
    {
        //
    }

    public function helloadd()
    {
        
        //iteration for test job
        for($i=0; $i<=10; $i++){
            Queue::push(new HelloJob($i));
            echo "hello world";
        }
    
        return response()->json("done");
       
    }

    //
}