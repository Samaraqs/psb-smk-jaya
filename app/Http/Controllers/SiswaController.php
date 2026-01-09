<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalonSiswa;
use App\Models\Pendaftaran;
use App\Models\Jurusan;
use Illuminate\Support\Facades\Storage;
use App\Models\BerkasPendaftaran;

class SiswaController extends Controller
{
    /**
     * Dashboard siswa
     */
public function dashboard()
{
    $pendaftaran = Pendaftaran::whereHas('calonSiswa', function ($q) {
        $q->where('user_id', auth()->id());
    })->first();

    return view('siswa.dashboard', compact('pendaftaran'));
}


    /**
     * Form pendaftaran siswa
     */
    public function form()
    {
        $jurusans = Jurusan::all();
        return view('siswa.form', compact('jurusans'));
    }

    /**
     * Simpan data pendaftaran
     */
    public function simpan(Request $request)
    {
        $calonSiswa = CalonSiswa::create([
            'user_id'       => auth()->id(),
            'nisn'          => $request->nisn,
            'nama_lengkap'  => $request->nama,
            'asal_sekolah'  => $request->asal,
            'alamat'        => $request->alamat
        ]);

        Pendaftaran::create([
            'calon_siswa_id' => $calonSiswa->id,
            'jurusan_id'     => $request->jurusan,
            'status'         => 'pending'
        ]);

        return redirect('/dashboard-siswa')
            ->with('success', 'Pendaftaran berhasil disimpan');
    }

    /**
     * Form upload berkas
     */
    public function uploadForm()
    {
        return view('siswa.upload-berkas');
    }

    /**
     * Proses upload berkas
     */
    public function uploadBerkas(Request $request)
    {
        $pendaftaran = Pendaftaran::whereHas('calonSiswa', function ($q) {
            $q->where('user_id', auth()->id());
        })->first();

        $filePath = $request->file('file')->store('berkas', 'public');

        BerkasPendaftaran::create([
            'pendaftaran_id'    => $pendaftaran->id,
            'jenis_berkas'      => $request->jenis_berkas,
            'file'              => $filePath,
            'status_verifikasi' => 'menunggu',
            'catatan'           => null
        ]);

        return redirect('/dashboard-siswa')
            ->with('success', 'Berkas berhasil diupload');
    }

    /**
     * Edit formulir pendaftaran
     */
    public function edit()
    {
        $pendaftaran = Pendaftaran::with('berkas')
            ->whereHas('calonSiswa', function ($q) {
                $q->where('user_id', auth()->id());
            })
            ->first();

        $jurusans = Jurusan::all();

        return view('siswa.form-edit', compact('pendaftaran', 'jurusans'));
    }

    /**
     * Update formulir pendaftaran
     */
    public function update(Request $request)
    {
        $pendaftaran = Pendaftaran::whereHas('calonSiswa', function ($q) {
            $q->where('user_id', auth()->id());
        })->first();

        $pendaftaran->calonSiswa->update([
            'nama_lengkap' => $request->nama,
            'asal_sekolah' => $request->asal
        ]);

        $pendaftaran->update([
            'jurusan_id' => $request->jurusan
        ]);

        return redirect('/dashboard-siswa')
            ->with('success', 'Data pendaftaran berhasil diperbarui');
    }


    public function hapusBerkas($id)
{
    $berkas = BerkasPendaftaran::findOrFail($id);

    // hapus file dari storage
    if (Storage::disk('public')->exists($berkas->file)) {
        Storage::disk('public')->delete($berkas->file);
    }

    // hapus data dari database
    $berkas->delete();

    return back()->with('success', 'Berkas berhasil dihapus. Silakan upload ulang.');
}
}
