<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images'; //indicamos la tabla

    //Relación One To MAny
    public function comments() {
        return $this->hasMany('App\Comment')->orderBy('id', 'desc');
    }

    //Relación One To Many
    public function likes() {
        return $this->hasMany('App\Like');
    }

    //Relación Many To One
    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
