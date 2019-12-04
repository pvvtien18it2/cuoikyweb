<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class datphong extends Model
{
    protected $table = 'datphongs';
    protected $fillable = ['name' , 'number_cmnd' , 'phone' , 'people' , 'dayBookRoom'];
    public $timestamps = false;
}
