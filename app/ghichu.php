<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ghichu extends Model
{
    protected $table = 'ghichus';
    protected $fillable = ['id' , 'phong_id' , 'name' , 'note' , 'day_create' , 'tinhtrang' ];

    public function phong()
    {
        return $this->belongsTo('App\phong');
    }
}
