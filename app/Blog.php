<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = "create_blog_table";
    
    protected $fillable = [
        'name','phone','email','rooms','add','come','back','people'
    ];     
}

