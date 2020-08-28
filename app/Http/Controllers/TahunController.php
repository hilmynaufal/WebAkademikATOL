<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TahunController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {

    	$data = DB::table('tahun')->get();

    	return view('tahun', ['tahun' => $data]);
    	
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
            'id_tahun' => 'required|max:8',
            'tahun_pelajaran' => 'required|max:16',
        ], $messages);



    	DB::table("tahun")->insert([
    		'id_tahun' => $request->id_tahun,
    		'tahun_pelajaran' => $request->tahun_pelajaran,
    	]);

    	return redirect('tahun');
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
            'id_tahun' => 'required|max:8',
            'tahun_pelajaran' => 'required|max:16',
        ], $messages);
        
         DB::table("tahun")->where("id_tahun", $request->id_tahun)->update([
    		'tahun_pelajaran' => $request->tahun_pelajaran,
    	]);

         DB::table("tahun")->where("tahun_pelajaran", $request->tahun_pelajaran)->update([
    		'id_tahun' => $request->id_tahun
    	]);

        return redirect('tahun');
    }

    public function destroy($id) {
        DB::table('tahun')->where('id_tahun', $id)->delete();

        return redirect('tahun');
    }
}
