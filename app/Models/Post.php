<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = ['title', 'deskripsi', 'categorypost_id', 'url', 'image', 'user_id', 'is_published'] ;

    
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            if(is_null($post->user_id)) {
                $post->user_id = auth()->user()->id;
            }
        });

        static::deleting(function ($post) {
        //    $post->comments()->delete();
            $post->tagposts()->detach();
        });
    }
    public function categorypost()
    {
        return $this->belongsTo('App\Models\Categorypost');
    }

    public function comment()
    {
        return $this->hasMany('App\Models\Commentpost');
    }

    public function tagposts()
    {
        return $this->belongsToMany('App\Models\Tagpost');
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
