<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SemesterController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index() {

    	$data = DB::table('semester')->get();

    	return view('semester', ['semester' => $data]);
    	
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
            'id_semester' => 'required|max:8',
            'semester' => 'required|max:16',
        ], $messages);



    	DB::table("semester")->insert([
    		'id_semester' => $request->id_semester,
    		'semester' => $request->semester,
    	]);

    	return redirect('semester');
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
            'id_semester' => 'required|max:1',
            'semester' => 'required|max:1',
        ], $messages);
        
         DB::table("semester")->where("id_semester", $request->id_semester)->update([
    		'semester' => $request->semester,
    	]);

         DB::table("semester")->where("semester", $request->semester)->update([
    		'id_semester' => $request->id_semester
    	]);

        return redirect('semester');
    }

    public function destroy($id) {
        DB::table('semester')->where('id_semester', $id)->delete();

        return redirect('semester');
    }
}
