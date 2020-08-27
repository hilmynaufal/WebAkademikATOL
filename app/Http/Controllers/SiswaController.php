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

        $messages = [
            'required' => ':attribute tidak boleh kosong!',
            'min' => ':attribute minimal :min karakter!',
            'max' => ':attribute maksimal :max karakter!',
            'date' => 'masukan format tanggal yg benar! Contoh: 2020-05-29'
        ];

        $this->validate($request,[
            'nisn' => 'required|max:8',
            'nama_siswa' => 'required|max:30',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|max:30',
            'kelas' => 'required',
        ], $messages);

        DB::table("siswa")->insert([
            'nisn' => $request->nisn,
            'nama_siswa' => $request->nama_siswa,
            'jk' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'id_kelas' => $request->kelas,
        ]);
        return redirect('/siswa');
    }

    public function update(Request $request) {

        $messages = [
            'required' => ':attribute tidak boleh kosong!',
            'min' => ':attribute minimal :min karakter!',
            'max' => ':attribute maksimal :max karakter!',
            'date' => 'masukan format tanggal yg benar! Contoh: 2020-05-29'
        ];

        $this->validate($request,[
            'nisn' => 'required|max:8',
            'nama_siswa' => 'required|max:30',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|max:30',
            'kelas' => 'required',
        ], $messages);
        

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
    	DB::table('nilai')->where('nisn', $id)->delete();
        DB::table('siswa')->where('nisn', $id)->delete();

        return redirect('siswa');
    }
    
}
