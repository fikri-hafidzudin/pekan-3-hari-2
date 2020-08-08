<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PertanyaanController extends Controller
{
    public function index(){
        $pertanyaan = DB::table('pertanyaan')->get();  
        return view('pertanyaan.index', compact('pertanyaan'));
    }

    public function create(){
        return view('pertanyaan.create');
    }

    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'judul'=> 'required',
            'isi'  => 'required'

        ]); 
        $query = DB::table('pertanyaan')->insert([
            "judul" => $request["judul"],
            "isi"   => $request["isi"]
        ]); 
        return redirect('/pertanyaan')->with('success', 'Pertanyaan anda telah diajukan');
    }

    public function show($pertanyaan_id){
        $pertanyaan = DB::table('pertanyaan')->where('id', $pertanyaan_id)->first(); 
        return view('pertanyaan.show', compact('pertanyaan'));
    }

    public function edit($pertanyaan_id){
        $pertanyaan = DB::table('pertanyaan')->where('id', $pertanyaan_id)->first(); 
        return view('pertanyaan.edit', compact('pertanyaan'));
    }

    public function update($pertanyaan_id, request $request){
         $query = DB::table('pertanyaan')
                    ->where('id', $pertanyaan_id)
                    ->update([
                        'judul'=> $request['judul'],
                        'isi'  =>$request['isi']
                    ]);
        return redirect('/pertanyaan');
    }

    public function destroy($pertanyaan_id){
        $query = DB::table('pertanyaan')->where('id',$pertanyaan_id)->delete();
        return redirect('/pertanyaan');
    }
}
