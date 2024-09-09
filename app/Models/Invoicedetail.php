<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoicedetail extends Model
{
    protected $table = 'invoicedetails';
    protected $fillable = 
    [
        'invoiceheader_id', 
        'deskripsi',
        'qty',
        'ppn_id',
        'jumlah'
    ] ;


    public function ppn()
    {
        return $this->belongsTo('App\Models\Ppn');
    }

    public function invoiceheader()
    {
        return $this->belongsTo('App\Models\Invoiceheader');
    }
}
