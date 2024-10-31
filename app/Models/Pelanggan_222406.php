<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan_222406 extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pelanggan_222406';

    protected $fillable = [
        'nama_222406',
        'email_222406',
        'telepon_222406',
        'alamat_222406',
        'tgl_terdaftar_222406',
        'jkl_222406',
    ];

}
