<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuruController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {

    	$data = DB::table('guru')->get();

    	return view('guru', ['guru' => $data]);
    	
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
            'nip' => 'required|max:8',
            'nama_guru' => 'required|max:30',
            'jenis_kelamin' => 'required|max:1',
            'tanggal_lahir' => 'required',
            'alamat' => 'required|max:30',
        ], $messages);


    	DB::table("guru")->insert([
    		'nip' => $request->nip,
    		'nama_guru' => $request->nama_guru,
            'jk' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
    	]);

    	return redirect('guru');
    }

    public function update(Request $request) {
        //

        $messages = [
            'required' => ':attribute tidak boleh kosong!',
            'min' => ':attribute minimal :min karakter!',
            'max' => ':attribute maksimal :max karakter!',
            'date' => 'masukan format tanggal yg benar! Contoh: 2020-05-29',
            'time' => 'masukan format waktu yang benar! Contoh: 20:00'
        ];

        $this->validate($request,[
            'nip' => 'required|max:8',
            'nama_guru' => 'required|max:30',
            'jenis_kelamin' => 'required|max:1',
            'tanggal_lahir' => 'required',
            'alamat' => 'required|max:30',
        ], $messages);

         DB::table("guru")->where('nip', $request->nip)->update([
    		'nama_guru' => $request->nama_guru,
            'jk' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
        ]);

        return redirect('guru');
    }

    public function destroy($id) {
        DB::table('guru')->where('Nip', $id)->delete();

        return redirect('guru');
    }
}
