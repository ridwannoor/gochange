<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $table = 'partners';
    protected $fillable = 
    [
        'badan_id', 
        'nama_perusahaan', 
        'alamat',
        'alamat_domisili', 
        'telp', 
        'kontak_person',
        'phone',
        'npwp',
        'email',
        'user_id'
    ] ;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($partner) {
            if(is_null($partner->user_id)) {
                $partner->user_id = auth()->user()->id;
            }
        });
    }

   
    public function badan()
    {
        return $this->belongsTo('App\Models\Badan');
    }
}
