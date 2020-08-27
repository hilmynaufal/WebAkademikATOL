<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuruController extends Controller
{
    //
    public function index() {

    	$data = DB::table('guru')->get();

    	return view('guru', ['guru' => $data]);
    	
    }

    public function store(Request $request) {
    	DB::table("guru")->insert([
    		'Nip' => $request->Nip,
    		'nama_guru' => $request->nama_guru,
            'jk' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'kelas_wali' => $request->kelas_wali,
    	]);

    	return redirect('guru');
    }

    public function update(Request $request) {
        //
         DB::table("guru")->where('Nip', $request->Nip)->update([
    		'nama_guru' => $request->nama_guru,
            'jk' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'kelas_wali' => $request->kelas_wali,
        ]);

        return redirect('guru');
    }

    public function destroy($id) {
        DB::table('guru')->where('Nip', $id)->delete();

        return redirect('guru');
    }
}
