<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    protected $table = 'generals';
    protected $fillable = ['title', 'deskripsi', 'image', 'phone', 'alamat', 'email', 'website', 'facebook', 'whatsapp', 'instagram'] ;

    public function accountbank()
    {
        return $this->hasMany('App\Models\Accountbank');
    }
}
