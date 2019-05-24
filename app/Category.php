<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'product_categories';

    protected $fillable = [
        'category_name','jenis',
    ];

    public function product()
    {
        return $this->belongsToMany('App\Product', 'product_category_details', 'product_id', 'category_id');
    }
}
