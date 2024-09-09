<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = 'banks';
    protected $fillable = ['kode_bank', 'nama_bank'] ;

    public function accountbank()
    {
        return $this->hasMany('App\Models\Accountbank');
    }
}
