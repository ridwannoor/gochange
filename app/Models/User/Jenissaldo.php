<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Jenissaldo extends Model
{
    protected $fillable = ['name', 'deskripsi', 'harga'];

    public function isisaldo()
    {
        return $this->hasMany('App\Models\User\Isisaldo');
    }
}
