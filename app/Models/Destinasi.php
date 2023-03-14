<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'alamat',
        'deskripsi',
    ];

    public function paket()
    {
        return $this->belongsToMany(Paket::class);
    }
}
