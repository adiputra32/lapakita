<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $table = "response";
  

    public function admin(){
        return $this->hasOne('App\Admin','id','admin_id');
    }
}
