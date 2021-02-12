<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public static $rules = array(
        'name' => 'required',
        'body' => 'required',
    );
}
