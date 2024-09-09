<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'galleries';
    protected $fillable = ['title', 'deskripsi', 'category_id', 'url',  'image' , 'user_id', 'is_published'] ;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($gallery) {
            if(is_null($gallery->user_id)) {
                $gallery->user_id = auth()->user()->id;
            }
        });
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Categorygallery');
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
