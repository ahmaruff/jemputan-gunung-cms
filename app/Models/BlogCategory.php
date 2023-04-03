<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
    ];

    public function post()
    {
        return $this->hasMany('App\Models\BlogPost','category_id', 'id');
    }
}
