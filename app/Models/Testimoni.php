<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    protected $table = 'testimonis';
    protected $fillable = ['title', 'deskripsi', 'email', 'name', 'image', 'user_id', 'is_published'] ;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($testimoni) {
            if(is_null($testimoni->user_id)) {
                $testimoni->user_id = auth()->user()->id;
            }
        });
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
