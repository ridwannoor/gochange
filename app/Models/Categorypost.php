<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorypost extends Model
{
    protected $table = 'categoryposts';
    protected $fillable = ['title', 'deskripsi'] ;

    public function posts()
    {
        return $this->hasMany('App\Models\post');
    }

}
