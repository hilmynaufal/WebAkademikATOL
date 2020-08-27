<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    //

    function index() {
    	$siswa = DB::table('siswa')->get();
        $pelajaran = DB::table('pelajaran')->get();
    	$data = DB::table('siswa')->join('nilai', 'siswa.Nisn', '=', 'nilai.Nisn')->join('pelajaran', 'nilai.kode_pelajaran', 'pelajaran.kode_pelajaran')->get();

    	return view('nilai', ['nilai' => $data, 'siswa' => $siswa, 'pelajaran' => $pelajaran]);
    }

    function show($id) {
    	$siswa = DB::table('siswa')->get();
        $pelajaran = DB::table('pelajaran')->get();
    	$data = DB::table('siswa')->join('nilai', 'siswa.Nisn', '=', 'nilai.Nisn')->join('pelajaran', 'nilai.kode_pelajaran', 'pelajaran.kode_pelajaran')->where('siswa.Nisn', $id)->get();

    	return view('nilai', ['nilai' => $data, 'siswa' => $siswa, 'pelajaran' => $pelajaran]);
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
            'na' => 'required|gt:0|lte:100|numeric',
            'kelulusan' => 'required'
        ], $messages);


        DB::table("nilai")->insert([
            'nisn' => $request->nisn,
            'kode_pelajaran' => $request->kode_pelajaran,
            'tugas' => $request->tugas,
            'uts' => $request->uts,
            'uas' => $request->uas,
            'kehadiran' => $request->kehadiran,
            'na' => $request->na,
            'kelulusan' => $request->kelulusan
        ]);

        return redirect('nilai');
    }

    public function update(Request $request) {
        //
         DB::table("nilai")->where('nisn', $request->OldNisn)->where('kode_pelajaran', $request->Oldkode_pelajaran)->update([
            'nisn' => $request->nisn,
            'kode_pelajaran' => $request->kode_pelajaran,
            'tugas' => $request->tugas,
            'uts' => $request->uts,
            'uas' => $request->uas,
            'kehadiran' => $request->kehadiran,
            'na' => $request->na,
            'kelulusan' => $request->kelulusan
        ]);

        return redirect('nilai');
    }

    public function destroy($id, $id2) {
        DB::table('nilai')->where('Nisn', $id)->where('kode_pelajaran', $id2)->delete();

        return redirect('nilai');
    }
}
