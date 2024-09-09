<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commentpost extends Model
{
    protected $table ='commentposts';
    protected $fillable = [
        'name', 
        'email', 
        'comment',
        'approved',
        'post_id'
    ];

    public function scopePublished($query)
    {
        return $query->where('approved', true);
    }

    public function scopeDrafted($query)
    {
        return $query->where('approved', false);
    }

    public function getPublishedAttribute()
    {
        return ($this->approved) ? 'Yes' : 'No';
    }

    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }
}
