<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    protected $table = 'pricings';
    protected $fillable = [
        'title', 
        'deskripsi', 
        'harga', 
        'camera', 
        'decoder', 
        'hdd', 
        'adaptor', 
        'power', 
        'hdmi', 
        'connector', 
        'catatan' , 
        'garansi',  
        'user_id', 
        'is_published'
        ] ;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($pricing) {
            if(is_null($pricing->user_id)) {
                $pricing->user_id = auth()->user()->id;
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
