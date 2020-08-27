<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {

    	$data = DB::table('siswa')->get();

        $kelas = DB::table('kelas')->get();

    	return view('siswa', ['siswa' => $data, 'kelas' => $kelas]);
    	
    }

    public function store(Request $request) {
    	DB::table("siswa")->insert([
    		'nisn' => $request->nisn,
    		'nama_siswa' => $request->nama_siswa,
            'jk' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'id_kelas' => $request->kelas,
    	]);

    	return redirect('siswa');
    }

    public function update(Request $request) {
        //
         DB::table("siswa")->where('nisn', $request->nisn)->update([
            'nama_siswa' => $request->nama_siswa,
            'jk' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'id_kelas' => $request->kelas,
        ]);

        return redirect('/siswa');
    }

    public function destroy($id) {
    	DB::table('nilai')->where('Nisn', $id)->delete();
        DB::table('siswa')->where('Nisn', $id)->delete();

        return redirect('siswa');
    }
    
}
