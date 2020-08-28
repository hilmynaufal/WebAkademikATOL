<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelajaranController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {

    	$data = DB::table('pelajaran')->get();

    	return view('pelajaran', ['pelajaran' => $data]);
    	
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
            'kode_pelajaran' => 'required|max:8',
            'nama_pelajaran' => 'required|max:16',
        ], $messages);



    	DB::table("pelajaran")->insert([
    		'kode_pelajaran' => $request->kode_pelajaran,
    		'nama_pelajaran' => $request->nama_pelajaran,
    	]);

    	return redirect('pelajaran');
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
            'kode_pelajaran' => 'required|max:8',
            'nama_pelajaran' => 'required|max:16',
        ], $messages);
        
         DB::table("pelajaran")->where("kode_pelajaran", $request->kode_pelajaran)->update([
    		'nama_pelajaran' => $request->nama_pelajaran,
    	]);

         DB::table("pelajaran")->where("nama_pelajaran", $request->nama_pelajaran)->update([
    		'kode_pelajaran' => $request->kode_pelajaran
    	]);

        return redirect('pelajaran');
    }

    public function destroy($id) {
        DB::table('pelajaran')->where('kode_pelajaran', $id)->delete();

        return redirect('pelajaran');
    }
}
