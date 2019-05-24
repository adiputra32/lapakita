<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    protected $table    = 'couriers';
    protected $fillable = ['courier'];

    public function transaction()
    {
        return $this->hasMany('App\Transaction', 'courier_id', 'id');
    }
}
