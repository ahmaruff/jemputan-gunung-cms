<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class Paket extends Model
{
    use HasFactory;
    protected $fillable =  [
        'judul',
        'thumbnail',
        'penjemputan',
        'deskripsi',
        'durasi',
        'rencana_perjalanan',
        'harga',
        'minimal_pax',
    ];

    public function destinasi()
    {
        return $this->belongsToMany(Destinasi::class);
    }
}
