<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class datphong extends Model
{
    protected $table = 'datphongs';
    protected $fillable = ['name' , 'number_cmnd' , 'phone' , 'people' , 'dayBookRoom' , 'songuoi','token','phong_id' , 'id'];
    public $timestamps = false;

    public function phong(){
        return $this->belongsTo('App\phong');
    }
}


