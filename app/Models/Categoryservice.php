<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoryservice extends Model
{
    protected $table = 'categoryservices';
    protected $fillable = ['title', 'deskripsi'] ;

    public function services()
    {
        return $this->hasMany('App\Models\Service');
    }

}
