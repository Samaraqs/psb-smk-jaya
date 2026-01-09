<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiSeleksi extends Model
{
    protected $table = 'nilai_seleksis';

    protected $fillable = [
        'pendaftaran_id',
        'nilai_rapor',
        'nilai_tes',
        'nilai_akhir'
    ];

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class);
    }
}
