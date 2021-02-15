<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = array('id');
    public $fillable = ['name', 'body'];
    
    public static $rules = array(
        'name' => 'required|max:64',
        'body' => 'required',
    );
    
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
