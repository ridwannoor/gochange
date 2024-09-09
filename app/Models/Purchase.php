<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table = 'purchases';
    protected $fillable = ['no_tagihan', 'periode', 'start_date', 'end_date', 'nilai',  'is_published'] ;


}
