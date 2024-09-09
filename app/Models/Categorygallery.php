<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorygallery extends Model
{
    protected $table = 'categorygalleries';
    protected $fillable = ['title', 'deskripsi'] ;

    public function gallerys()
    {
        return $this->hasMany('App\Models\Gallery');
    }

}
