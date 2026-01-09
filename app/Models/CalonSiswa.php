<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CalonSiswa extends Model {
    protected $fillable = ['user_id','nisn','nama_lengkap','asal_sekolah','alamat'];
    public function pendaftaran() {
        return $this->hasOne(Pendaftaran::class);
    }


    
}
