<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Isisaldo extends Model
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
        'usd',
        'idr',
        // 'email',
        'jenissaldo_id',
        'user_id'
    ];
    public function jenissaldo()
    {
        return $this->belongsTo('App\Models\User\Jenissaldo');
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

        static::creating(function ($saldo) {
            if (is_null($saldo->user_id)) {
                $saldo->user_id = auth()->user()->id;
            }
        });
    }
}
