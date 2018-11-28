<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class assignment extends Model
{
    protected $table='assignment';
    public $timestamps = false;
    public function users()
    {
        return $this->belongstoMany('App\users');
    }
}
