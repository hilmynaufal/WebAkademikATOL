<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    function index() {
    	$siswa = DB::table('siswa')->get();
        $semester = DB::table('semester')->get();
        $tahun = DB::table('tahun')->get();
        $pelajaran = DB::table('pelajaran')->get();
    	$data = DB::table('siswa')->join('nilai', 'siswa.Nisn', '=', 'nilai.Nisn')->join('pelajaran', 'nilai.kode_pelajaran', 'pelajaran.kode_pelajaran')->get();

    	return view('nilai', ['nilai' => $data, 'siswa' => $siswa, 'pelajaran' => $pelajaran, 'tahun' => $tahun, 'semester' => $semester]);
    }

    function show($id) {
    	$siswa = DB::table('siswa')->get();
        $semester = DB::table('semester')->get();
        $tahun = DB::table('tahun')->get();
        $pelajaran = DB::table('pelajaran')->get();
    	$data = DB::table('siswa')->join('nilai', 'siswa.Nisn', '=', 'nilai.Nisn')->join('pelajaran', 'nilai.kode_pelajaran', 'pelajaran.kode_pelajaran')->where('siswa.Nisn', $id)->get();

    	return view('nilai', ['nilai' => $data, 'siswa' => $siswa, 'pelajaran' => $pelajaran, 'tahun' => $tahun, 'semester' => $semester]);
    }

    public function store(Request $request) {


        $messages = [
            'required' => ':attribute tidak boleh kosong!',
            'min' => ':attribute minimal :min karakter!',
            'max' => ':attribute maksimal :max karakter!',
            'date' => 'masukan format tanggal yg benar! Contoh: 2020-05-29',
            'time' => 'masukan format waktu yang benar! Contoh: 20:00',
            'gt' => ':attribute harus lebih dari 0!',
            'lte' => ':attribute tidak boleh lebih dari 100'
        ];

        $this->validate($request,[
            'nisn' => 'required|max:16',
            'kode_pelajaran' => 'required|max:8',
            'tugas' => 'required|gt:0|lte:100|numeric',
            'uts' => 'required|gt:0|lte:100|numeric',
            'uas' => 'required|gt:0|lte:100|numeric',
            'kehadiran' => 'required|gt:0|lte:100|numeric',
            'id_tahun' =>'required',
            'id_semester' => 'required'
        ], $messages);


        $sum = ($request->kehadiran * 0.05 + $request->tugas * 0.25 + $request->uts * 0.3 + $request->uas * 0.4);

        if ($sum >= 80) {
            $predikat = 'A';
        } elseif ($sum <= 79 && $sum >= 68) {
            $predikat = 'B';
        } elseif ($sum <= 67 && $sum >= 56) {
            $predikat = 'C';
        } elseif ($sum <= 55 && $sum >= 45) {
            $predikat = 'D';
        } else {
            $predikat = 'C';
        }

        if ($sum >= 55) {
            $kelulusan = "Lulus";
        } else {
            $kelulusan = "Tidak Lulus";
        }


        DB::table("nilai")->insert([
            'nisn' => $request->nisn,
            'kode_pelajaran' => $request->kode_pelajaran,
            'tugas' => $request->tugas,
            'uts' => $request->uts,
            'uas' => $request->uas,
            'kehadiran' => $request->kehadiran,
            'na' => $sum,
            'predikat' => $predikat,
            'kelulusan' => $kelulusan,
            'id_tahun' => $request->id_tahun,
            'id_semester' => $request->id_semester
        ]);

        return redirect('nilai');
    }

    public function update(Request $request) {

        $messages = [
            'required' => ':attribute tidak boleh kosong!',
            'min' => ':attribute minimal :min karakter!',
            'max' => ':attribute maksimal :max karakter!',
            'date' => 'masukan format tanggal yg benar! Contoh: 2020-05-29',
            'time' => 'masukan format waktu yang benar! Contoh: 20:00',
            'gt' => ':attribute harus lebih dari 0!',
            'lte' => ':attribute tidak boleh lebih dari 100'
        ];

        $this->validate($request,[
            'nisn' => 'required|max:16',
            'kode_pelajaran' => 'required|max:8',
            'tugas' => 'required|gt:0|lte:100|numeric',
            'uts' => 'required|gt:0|lte:100|numeric',
            'uas' => 'required|gt:0|lte:100|numeric',
            'kehadiran' => 'required|gt:0|lte:100|numeric',
            'id_tahun' =>'required',
            'id_semester' => 'required'
        ], $messages);
        //

        $sum = ($request->kehadiran * 0.05 + $request->tugas * 0.25 + $request->uts * 0.3 + $request->uas * 0.4);

        if ($sum >= 80) {
            $predikat = 'A';
        } elseif ($sum <= 79 && $sum >= 68) {
            $predikat = 'B';
        } elseif ($sum <= 67 && $sum >= 56) {
            $predikat = 'C';
        } elseif ($sum <= 55 && $sum >= 45) {
            $predikat = 'D';
        } else {
            $predikat = 'C';
        }

        if ($sum >= 55) {
            $kelulusan = "Lulus";
        } else {
            $kelulusan = "Tidak Lulus";
        }


        DB::table("nilai")->where('nisn', $request->OldNisn)->where('kode_pelajaran', $request->Oldkode_pelajaran)->where('id_tahun', $request->OldTahun)->where('id_semester', $request->OldSemester)->update([
            'nisn' => $request->nisn,
            'kode_pelajaran' => $request->kode_pelajaran,
            'tugas' => $request->tugas,
            'uts' => $request->uts,
            'uas' => $request->uas,
            'kehadiran' => $request->kehadiran,
            'na' => $sum,
            'predikat' => $predikat,
            'kelulusan' => $kelulusan,
            'id_tahun' => $request->id_tahun,
            'id_semester' => $request->id_semester
        ]);

        return redirect('nilai');
    }

    public function destroy($id, $id2, $id3, $id4) {
        DB::table('nilai')->where('Nisn', $id)->where('kode_pelajaran', $id2)->where('id_tahun', $id3)->where('id_semester', $id4)->delete();

        return redirect('nilai');
    }
}
