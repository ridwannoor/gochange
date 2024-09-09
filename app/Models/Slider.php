<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'sliders';
    protected $fillable = ['title', 'deskripsi', 'url', 'image','user_id'] ;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($slider) {
            if(is_null($slider->user_id)) {
                $slider->user_id = auth()->user()->id;
            }
        });

        // static::deleting(function ($blog) {
        //    $blog->comments()->delete();
        //     $blog->tagblogs()->detach();
        // });
    }
}
