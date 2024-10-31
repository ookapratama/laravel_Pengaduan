<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluhan_222406 extends Model
{
    use HasFactory;
    // protected $primaryKey = 'id_keluhan_222406';

    protected $fillable = [
        'id_pelanggan_222406',
        'id_kategori_222406',
        'keluhan_222406',
        'tgl_keluhan_222406',
        'status_keluhan_222406',
    ];

    public function pelanggan() {
        return $this->hasOne(Pelanggan_222406::class, 'id', 'id_pelanggan_222406');
    }

    public function kategori() {
        return $this->hasOne(KategoriKeluhan_222406::class, 'id', 'id_kategori_222406');
    }
}
