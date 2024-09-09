<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoryteam extends Model
{
    protected $table = 'categoryteams';
    protected $fillable = ['title', 'deskripsi'] ;

    public function teams()
    {
        return $this->hasMany('App\Models\Team');
    }

}
