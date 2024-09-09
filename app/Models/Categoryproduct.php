<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoryproduct extends Model
{
    protected $table = 'categoryproducts';
    protected $fillable = ['title', 'deskripsi', 'image'];

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function subcategory()
    {
        return $this->hasMany('App\Models\Subcategory');
    }
}
