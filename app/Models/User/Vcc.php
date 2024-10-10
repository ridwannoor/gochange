<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Vcc extends Model
{
    protected $fillable = [
        'no_invoice',
        'customer_name',
        'customer_phone',
        'customer_email',
        'total',
        'payment_status',
        'payment_date',
        'payment_channel',
        'payment_approval_code',
        'payment_session_id',
        'no_telp',
        'jenisvcc_id',
        'user_id'
    ];

    public function jenisvcc()
    {
        return $this->belongsTo('App\Models\User\Jenisvcc');
    }

    // public function metodebayar()
    // {
    //     return $this->belongsTo('App\Models\User\Metodebayar');
    // }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($vcc) {
            if (is_null($vcc->user_id)) {
                $vcc->user_id = auth()->user()->id;
            }
        });
    }
}
