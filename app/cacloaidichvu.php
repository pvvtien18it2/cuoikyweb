<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cacloaidichvu extends Model
{
    protected $table = 'cacloaidichvu';
    protected $fillable = ['tenDV','giaDV','loai','count'];
    public $timestamps = false;
}
