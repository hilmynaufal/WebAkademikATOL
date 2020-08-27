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
        DB::table("nilai")->insert([
            'Nisn' => $request->Nisn,
            'kode_pelajaran' => $request->kode_pelajaran,
            'uts' => $request->uts,
            'uas' => $request->uas,
            'na' => $request->na,
            'hm' => $request->hm
        ]);

        return redirect('nilai');
    }

    public function update(Request $request) {
        //
         DB::table("nilai")->where('Nisn', $request->OldNisn)->where('kode_pelajaran', $request->Oldkode_pelajaran)->update([
            'Nisn' => $request->Nisn,
            'kode_pelajaran' => $request->kode_pelajaran,
            'uts' => $request->uts,
            'uas' => $request->uas,
            'na' => $request->na,
            'hm' => $request->hm
        ]);

        return redirect('nilai');
    }

    public function destroy($id, $id2) {
        DB::table('nilai')->where('Nisn', $id)->where('kode_pelajaran', $id2)->delete();

        return redirect('nilai');
    }
}
