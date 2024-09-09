<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoryvideo extends Model
{
    protected $table = 'categoryvideos';
    protected $fillable = ['title', 'deskripsi'];

    public function videos()
    {
        return $this->hasMany('App\Models\Video');
    }
}
