<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dari nama model yang jamak
    protected $table = 'tickets';

    // Atribut yang dapat diisi secara massal
    protected $fillable = [
        'nama_wisata', 
        'harga_ticket',
        'gambar'
    ];
}
