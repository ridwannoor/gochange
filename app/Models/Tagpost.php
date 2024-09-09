<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tagpost extends Model
{
    protected $table = 'tagposts';
    protected $fillable = ['title', 'deskripsi'] ;

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post');
    }
}
