<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class phong extends Model
{
    protected $table = 'phong';
    protected $fillable = ['maP', 'tenP', 'loaiP', 'hour', 'day', 'tinhtrang', 'maDV', 'maNV', 'trong'];

    public function dichvu()
    {
        return $this->hasMany('App\dichvu');
    }
    public function quanlyphong()
    {
        return $this->hasMany('App\quanlyphong');
    }
    public function datphong()
    {
        return $this->hasMany('App\datphong');
    }
}
