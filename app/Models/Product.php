<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['title', 'deskripsi', 'expend', 'harga', 'categoryproduct_id', 'subcategory_id', 'user_id', 'is_published'] ;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            if(is_null($product->user_id)) {
                $product->user_id = auth()->user()->id;
            }
        });
    }

    public function subcategory()
    {
        return $this->belongsTo('App\Models\Subcategory');
    }

    public function categoryproduct()
    {
        return $this->belongsTo('App\Models\Categoryproduct');
    }
    
    public function productdetails()
    {
        return $this->hasMany('App\Models\Productdetail');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeDrafted($query)
    {
        return $query->where('is_published', false);
    }

    public function getPublishedAttribute()
    {
        return ($this->is_published) ? 'Yes' : 'No';
    }
}
