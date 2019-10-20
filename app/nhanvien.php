<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nhanvien extends Model
{
    protected $table = 'nhanvien';
    protected $fillable = ['name','phone','email','pass','admin'];
    public $timestamps = false;
}
