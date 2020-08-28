<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index() {

        $guru = DB::table('guru')->get();
        $pelajaran = DB::table('pelajaran')->get();
        $kelas = DB::table('kelas')->get();


    	$data = DB::table('jadwal')->join('guru', 'jadwal.Nip', '=', 'guru.Nip')->join('pelajaran', 'jadwal.kode_pelajaran', '=', 'pelajaran.kode_pelajaran')->get();

    	return view('jadwal', ['jadwal' => $data, 'guru' => $guru, 'pelajaran' => $pelajaran, 'kelas' => $kelas]);
    	
    }

    public function store(Request $request) {

        $messages = [
            'required' => ':attribute tidak boleh kosong!',
            'min' => ':attribute minimal :min karakter!',
            'max' => ':attribute maksimal :max karakter!',
            'date' => 'masukan format tanggal yg benar! Contoh: 2020-05-29',
            'time' => 'masukan format waktu yang benar! Contoh: 20:00'
        ];

        $this->validate($request,[
            'nip' => 'required|max:16',
            'kode_pelajaran' => 'required|max:30',
            'hari' => 'required|max:8',
            'waktu' => 'required|max:8',
            'lama' => 'required|max:8',
            'kelas' => 'required|max:8',
        ], $messages);


    	DB::table("jadwal")->insert([
    		'nip' => $request->nip,
    		'kode_pelajaran' => $request->kode_pelajaran,
            'hari' => $request->hari,
            'waktu' => $request->waktu,
            'lama' => $request->lama,
            'id_kelas' => $request->kelas,
    	]);

    	return redirect('jadwal');
    }

    public function update(Request $request) {

        $messages = [
            'required' => ':attribute tidak boleh kosong!',
            'min' => ':attribute minimal :min karakter!',
            'max' => ':attribute maksimal :max karakter!',
            'date' => 'masukan format tanggal yg benar! Contoh: 2020-05-29',
            'time' => 'masukan format waktu yang benar! Contoh: 20:00'
        ];

        $this->validate($request,[
            'nip' => 'required|max:16',
            'kode_pelajaran' => 'required|max:30',
            'hari' => 'required|max:8',
            'waktu' => 'required|max:8',
            'lama' => 'required|max:8',
            'kelas' => 'required|max:8',
        ], $messages);


         DB::table("jadwal")->where("Id_jdwl", $request->Id_jdwl)->update([
            'nip' => $request->nip,
            'kode_pelajaran' => $request->kode_pelajaran,
            'hari' => $request->hari,
            'waktu' => $request->waktu,
            'lama' => $request->lama,
            'id_kelas' => $request->kelas,
        ]);

        return redirect('jadwal');
    }

    public function destroy($id) {
    	DB::table('jadwal')->where('Id_jdwl', $id)->delete();

        return redirect('jadwal');
    }
}
