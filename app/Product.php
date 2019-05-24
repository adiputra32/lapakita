<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name', 'price', 'description','product_rate','stock','weight'
    ];

    public function category()
    {
        return $this->belongsToMany('App\Category', 'product_category_details', 'product_id', 'category_id');
    }

    public function product_image()
    {
        return $this->hasMany('App\Product_Image');
    }

    public function discount(){
        return $this->hasMany('App\Discount', 'id_product');
    }
}
