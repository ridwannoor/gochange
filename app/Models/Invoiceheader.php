<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoiceheader extends Model
{
    protected $table = 'invoiceheaders';
    protected $fillable = 
    [
        'no_invoice', 
        'no_po',
        'tgl_invoice',
        'partner_id', 
        'perihal',         
        'catatan',
        'diskon',
        'total',
        'user_id', 
        'status'
    ] ;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($invoiceheader) {
            if(is_null($invoiceheader->user_id)) {
                $invoiceheader->user_id = auth()->user()->id;
            }
        });
    }

   
    
    public function scopePublished($query)
    {
        return $query->where('status', true);
    }

    public function scopeDrafted($query)
    {
        return $query->where('status', false);
    }

    public function getPublishedAttribute()
    {
        return ($this->status) ? 'Yes' : 'No';
    }

   
    public function partner()
    {
        return $this->belongsTo('App\Models\Partner');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function invoicedetail()
    {
        return $this->hasMany('App\Models\Invoicedetail');
    }
}
