<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Comment extends Model 
{
    
    protected $fillable = [
        'descr_comment', 'author_comment', 'post_ref', 'data_ora_post',
    ];

}
