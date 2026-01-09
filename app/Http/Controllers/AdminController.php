<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\NilaiSeleksi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /* ======================
     | DASHBOARD ADMIN
     ====================== */
    public function dashboard()
    {
        return view('admin.dashboard', [
            'pendingCount'  => Pendaftaran::where('status','pending')->count(),
            'lulusCount'    => Pendaftaran::where('status','lulus')->count(),
            'cadanganCount' => Pendaftaran::where('status','cadangan')->count(),
            'ditolakCount'  => Pendaftaran::where('status','ditolak')->count(),
        ]);
    }

    /* ======================
     | DATA PENDAFTAR
     ====================== */
    public function pending()
    {
        $data = Pendaftaran::with('calonSiswa','jurusan')
            ->where('status','pending')
            ->get();

        return view('admin.pendaftar-pending', compact('data'));
    }

    public function lulus()
    {
        $data = Pendaftaran::with('calonSiswa','jurusan')
            ->where('status','lulus')
            ->get();

        return view('admin.pendaftar-lulus', compact('data'));
    }

    public function cadangan()
    {
        $data = Pendaftaran::with('calonSiswa','jurusan')
            ->where('status','cadangan')
            ->get();

        return view('admin.pendaftar-cadangan', compact('data'));
    }

    public function ditolak()
    {
        $data = Pendaftaran::with('calonSiswa','jurusan')
            ->where('status','ditolak')
            ->get();

        return view('admin.pendaftar-ditolak', compact('data'));
    }

    /* ======================
     | DETAIL & VERIFIKASI
     ====================== */
    public function detail($id)
    {
        $pendaftaran = Pendaftaran::with(
            'calonSiswa',
            'jurusan',
            'berkas',
            'nilaiSeleksi'
        )->findOrFail($id);

        return view('admin.detail-pendaftar', compact('pendaftaran'));
    }

    public function verifikasi(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:lulus,cadangan,ditolak'
        ]);

        Pendaftaran::where('id', $id)->update([
            'status' => $request->status
        ]);

        return redirect('/admin/pendaftar/pending')
            ->with('success','Status pendaftaran berhasil diperbarui');
    }

    /* ======================
     | NILAI SELEKSI
     ====================== */
    public function nilai(Request $request)
    {
        $request->validate([
            'id'    => 'required|exists:pendaftarans,id',
            'rapor' => 'required|numeric|min:0|max:100',
            'tes'   => 'required|numeric|min:0|max:100',
        ]);

        $nilaiAkhir = ($request->rapor + $request->tes) / 2;

        // simpan / update nilai
        NilaiSeleksi::updateOrCreate(
            ['pendaftaran_id' => $request->id],
            [
                'nilai_rapor' => $request->rapor,
                'nilai_tes'   => $request->tes,
                'nilai_akhir' => $nilaiAkhir
            ]
        );

        // logika seleksi
        $status = match (true) {
            $nilaiAkhir >= 80 => 'lulus',
            $nilaiAkhir >= 65 => 'cadangan',
            default           => 'ditolak',
        };

        Pendaftaran::where('id', $request->id)->update([
            'status' => $status
        ]);

        return back()->with('success','Nilai seleksi & status berhasil diperbarui');
    }

    /* ======================
     | LAPORAN
     ====================== */
    public function laporan()
    {
        $data = Pendaftaran::with('calonSiswa','jurusan','nilaiSeleksi')->get();

        return view('admin.laporan.index', compact('data'));
    }

    public function laporanStatus($status)
    {
        $data = Pendaftaran::with('calonSiswa','jurusan','nilaiSeleksi')
            ->where('status', $status)
            ->get();

        return view('admin.laporan.index', compact('data','status'));
    }

    /* ======================
     | CETAK PDF
     ====================== */
public function cetakLaporan()
{
    $data = Pendaftaran::with('calonSiswa','jurusan')->get();

    $pdf = Pdf::loadView('admin.laporan.pdf', [
        'data' => $data
    ]);

    return $pdf->download('laporan-psb.pdf');
}


}
