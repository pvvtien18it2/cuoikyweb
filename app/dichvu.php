<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dichvu extends Model
{
    protected $table = 'dichvu';
    protected $fillable = ['nuocsuoi','coca','pepsi','bohuc','biasaigon','biaheineken','biacorona','craven','baso','anuong','combo1','combo2','combo3','combo4','tongdichvu'];
    public function phong(){
        return $this->belongsTo('App\phong');
    }
}
