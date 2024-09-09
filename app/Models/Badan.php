<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Badan extends Model
{
    protected $table = 'badans';
    protected $fillable = ['title', 'deskripsi'] ;

    public function partners()
    {
        return $this->hasMany('App\Models\Partner');
    }
}
