<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $table = 'subcategories';
    protected $fillable = ['name','categoryproduct_id'];

    public function categoryproduct()
    {
        return $this->belongsTo('App\Models\Categoryproduct');
    }

    public function products(){

        return $this->hasMany('App\Models\Product');

    }
}
