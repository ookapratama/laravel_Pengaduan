<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanggapan_222406 extends Model
{
    use HasFactory;
    // protected $primaryKey  = 'id_tanggapan_222406';

    protected $fillable = [
        'id_keluhan_222406',
        'tanggapan_222406',
        'tgl_tanggapan_222406',
    ];

    public function keluhan() {
        return $this->hasOne(Keluhan_222406::class, 'id', 'id_keluhan_222406');
    }
}
