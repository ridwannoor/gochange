<?php

namespace App\Models\Router;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';
    protected $fillable = ['session_name', 'ip_mikrotik', 'username', 'password', 'port', 'user_id', 'hotspot_name', 'dns_name', 'currency', 'session_timeout', 'live_report', 'phone', 'image'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($setting) {
            if (is_null($setting->user_id)) {
                $setting->user_id = auth()->user()->id;
            }
        });
    }

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
}
