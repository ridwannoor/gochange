<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banners';
    protected $fillable = ['title', 'deskripsi', 'url', 'image', 'user_id'] ;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($banner) {
            if(is_null($banner->user_id)) {
                $banner->user_id = auth()->user()->id;
            }
        });

        // static::deleting(function ($blog) {
        //    $blog->comments()->delete();
        //     $blog->tagblogs()->detach();
        // });
    }
}
