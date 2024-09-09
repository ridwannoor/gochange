<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'videos';
    protected $fillable = ['title', 'deskripsi', 'categoryvideo_id', 'url', 'image', 'user_id', 'is_published'] ;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($video) {
            if(is_null($video->user_id)) {
                $video->user_id = auth()->user()->id;
            }
        });
    }

    public function categoryvideo()
    {
        return $this->belongsTo('App\Models\Categoryvideo');
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
