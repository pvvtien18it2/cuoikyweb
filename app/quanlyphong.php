<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class quanlyphong extends Model
{
    protected $table = 'quanlyphongs';
    protected $fillable =['phong_id','created_at', 'number_cmnd' , 'name' , 'people','day_create'];

    public function phong(){
        return $this->belongsTo('App\phong');
    }
}
