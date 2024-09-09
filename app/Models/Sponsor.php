<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $table = 'sponsors';
    protected $fillable = ['title', 'deskripsi', 'url', 'image', 'user_id'] ;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($sponsor) {
            if(is_null($sponsor->user_id)) {
                $sponsor->user_id = auth()->user()->id;
            }
        });

        // static::deleting(function ($blog) {
        //    $blog->comments()->delete();
        //     $blog->tagblogs()->detach();
        // });
    }
}
