<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoryportfolio extends Model
{
    protected $table = 'categoryportfolios';
    protected $fillable = ['title', 'deskripsi'] ;

    public function portfolios()
    {
        return $this->hasMany('App\Models\Portfolio');
    }

}
