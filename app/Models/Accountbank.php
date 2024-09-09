<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accountbank extends Model
{
    protected $table = 'accountbanks';
    protected $fillable = ['general_id', 'bank_id', 'no_rek', 'pemilik'] ;

    public function bank()
    {
        return $this->belongsTo('App\Models\Bank');
    }
    public function general()
    {
        return $this->belongsTo('App\Models\General');
    }
}
