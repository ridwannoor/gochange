<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $table = 'portfolios';
    protected $fillable = ['title', 'deskripsi',  'category_id', 'url', 'image','user_id',  'is_published'] ;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($portfolio) {
            if(is_null($portfolio->user_id)) {
                $portfolio->user_id = auth()->user()->id;
            }
        });
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Categoryportfolio');
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
