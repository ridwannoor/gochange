<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Isisaldo extends Model
{
    protected $table = 'isisaldos';
    protected $fillable = [
        'no_invoice',
        'checkout_link',
        'external_id',
        'customer_email',
        'total',
        'status',
        'usd',
        'idr',
        // 'email',
        'jenissaldo_id',
        'user_id'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($isisaldo) {
            if (is_null($isisaldo->user_id)) {
                $isisaldo->user_id = auth()->user()->id;
            }
        });
    }

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
}
