<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelajaranController extends Controller
{
    //
    public function index() {

    	$data = DB::table('pelajaran')->get();

    	return view('pelajaran', ['pelajaran' => $data]);
    	
    }

    public function store(Request $request) {
    	DB::table("pelajaran")->insert([
    		'kode_pelajaran' => $request->kode_pelajaran,
    		'nama_pelajaran' => $request->nama_pelajaran,
    		'tingkat' => $request->tingkat
    	]);

    	return redirect('pelajaran');
    }

    public function update(Request $request) {
        //
         DB::table("pelajaran")->where("kode_pelajaran", $request->kode_pelajaran)->update([
    		'nama_pelajaran' => $request->nama_pelajaran,
    		'tingkat' => $request->tingkat
    	]);

         DB::table("pelajaran")->where("nama_pelajaran", $request->nama_pelajaran)->update([
    		'kode_pelajaran' => $request->kode_pelajaran
    	]);

        return redirect('pelajaran');
    }

    public function destroy($id) {
    	DB::table('nilai')->where('kode_pelajaran', $id)->delete();
        DB::table('pelajaran')->where('kode_pelajaran', $id)->delete();

        return redirect('pelajaran');
    }
}
