<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Productdetail extends Model
{
    protected $table = 'productdetails';
    protected $fillable = ['product_id',  'image'] ;

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
