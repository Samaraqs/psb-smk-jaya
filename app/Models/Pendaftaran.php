<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model {
    protected $fillable = ['calon_siswa_id','jurusan_id','status'];


public function calonSiswa()
{
    return $this->belongsTo(CalonSiswa::class);
}

public function berkas()
{
    return $this->hasMany(BerkasPendaftaran::class);
}

public function jurusan()
{
    return $this->belongsTo(Jurusan::class);
}

public function nilaiSeleksi()
{
    return $this->hasOne(NilaiSeleksi::class);
}



}


