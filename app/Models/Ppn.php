<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ppn extends Model
{
    protected $table = 'ppns';
    protected $fillable = ['name'] ;

    /**
     * Get the user that owns the Ppn
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function invoicedetail()
    {
        return $this->hasMany('App\Models\Invoicedetail');
    }
}
