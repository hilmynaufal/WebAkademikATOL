<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    //
    public function index() {

    	$data = DB::table('kelas')->get();

    	return view('kelas', ['kelas' => $data]);
    	
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
            'id_kelas' => 'required|max:8',
            'nama_kelas' => 'required|max:8',
        ], $messages);


    	DB::table("kelas")->insert([
    		'id_kelas' => $request->id_kelas,
    		'nama_kelas' => $request->nama_kelas,
    	]);

    	return redirect('kelas');
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
            'id_kelas' => 'required|max:8',
            'nama_kelas' => 'required|max:8',
        ], $messages);

        //
         DB::table("kelas")->where("id_kelas", $request->id_kelas)->update([
    		'nama_kelas' => $request->nama_kelas,
    	]);

         DB::table("kelas")->where("nama_kelas", $request->nama_kelas)->update([
    		'id_kelas' => $request->id_kelas
    	]);

        return redirect('kelas');
    }

    public function destroy($id) {
        DB::table('kelas')->where('id_kelas', $id)->delete();

        return redirect('kelas');
    }
}
