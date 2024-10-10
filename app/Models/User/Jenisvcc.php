<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Jenisvcc extends Model
{
    protected $fillable = ['name', 'deskripsi', 'harga'];

    public function Vcc()
    {
        return $this->hasMany('App\Models\User\Vcc');
    }
}
