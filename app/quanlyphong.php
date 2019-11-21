<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class quanlyphong extends Model
{
    protected $table = 'quanlyphongs';
    protected $fillable =['phong_id','created_at'];

    public function phong(){
        return $this->belongsTo('App\phong');
    }
}
