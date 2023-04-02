<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class BlogPost extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'category_id',
        'date',
        'slug',
        'content_html',
        'content_delta',
        'draft',
    ];

    public function category()
    {
        return $this->belongsTo('\App\Models\BlogCategory');
    }
}
