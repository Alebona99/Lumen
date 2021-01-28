<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Post extends Model 
{
    
    protected $fillable = [
        'descr_post', 'author_post', 'data_ora_post',
    ];

}
