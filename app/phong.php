<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class phong extends Model
{
    protected $table = 'phong';
    protected $fillable = ['maP','tenP','loaiP','giaP/hour','giaP/day','tinhtrang','maDV','maNV','trong'];
}
