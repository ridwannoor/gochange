<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
    protected $fillable = ['title', 'deskripsi', 'categoryservice_id', 'url', 'image' , 'user_id', 'is_published'] ;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($service) {
            if(is_null($service->user_id)) {
                $service->user_id = auth()->user()->id;
            }
        });
    }

    public function categoryservice()
    {
        return $this->belongsTo('App\Models\Categoryservice');
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
