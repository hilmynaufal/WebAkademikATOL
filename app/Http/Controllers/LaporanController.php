<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use PDF;

class LaporanController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {

        $siswa = DB::table('siswa')->get();
        $tahun = DB::table('tahun')->get();
        $semester = DB::table('semester')->get();

    	$data = DB::table('siswa')->join('nilai', 'siswa.Nisn', '=', 'nilai.Nisn')->join('pelajaran', 'nilai.kode_pelajaran', 'pelajaran.kode_pelajaran')->get();

    	return view('laporan', ['data' => $data, 'siswa' => $siswa, 'tahun' => $tahun, 'semester' => $semester]);
    	
    }

    public function cetak_pdf($id, $id2, $id3) {
    	$siswa = DB::table('siswa')->join('kelas', 'siswa.id_kelas', '=', 'kelas.id_kelas')->where('nisn', $id)->get();

        $semester = DB::table('semester')->where('id_semester', $id3)->get();
        $tahun = DB::table('tahun')->where('id_tahun', $id2)->get();

        $nilai = DB::table('nilai')->join('pelajaran', 'nilai.kode_pelajaran', '=', 'pelajaran.kode_pelajaran')->where('nisn', $id)->where('id_tahun', $id2)->where('id_semester', $id3)->get();

    	$pdf = PDF::loadview('laporan_pdf', ['siswa' => $siswa, 'semester' => $semester, 'tahun' => $tahun, 'nilai' => $nilai]);
    	return $pdf->stream('laporan-nilai-pdf');
    }

    public function test() {
        $siswa = DB::table('siswa')->get();

        return view('testing', ['siswa' => $siswa]);
    }
}
