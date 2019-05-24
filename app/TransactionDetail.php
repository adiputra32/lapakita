<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $table = "transaction_details";
    protected $fillable = [
        'transaction_id','product_id','qty','discount','selling_price',
    ];
    public function product(){
        return $this->hasOne('App\Product','id','product_id');
    }

}
