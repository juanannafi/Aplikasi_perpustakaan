<?php

namespace App\Http\Controllers;

use App\Models\Penulis;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenulisController extends Controller
{
    public function index(){
        $datass = Penulis::all();

        return view('Penulis/penulis', compact('datass'));
    }

    // public function show($id){
    //     $penerbit = Penerbit::find($id);

    //     return view('', compact('penerbit')); 
    // }

    public function create(){
        return view('Penulis/create'); 
    }

    public function edit($id){

        $penulis = Penulis::find($id);

        return view('penulis/edit', compact('penulis')); 
    }

    public function store(Request $request){
        $validated = $request->validate([
            'nm_penulis' => ['required', 'string'],
            'tgl_lahir' => ['required'],
            'jn_kelamin' => ['required'],
            'ket' => ['required']
        ]);
        
        $user = Auth::user();
        $create = Penulis::create([
            'nm_penulis'=> $validated["nm_penulis"],
            'tgl_lahir'=>$validated["tgl_lahir"],
            'jn_kelamin'=>$validated["jn_kelamin"],
            'ket'=>$validated["ket"],
            'created_by'=>$user->id,    
        ]);

        if(!$create){
            return back()->withErrors(['create' => 'Gagal menyimpan Penulis!']);
        }

        return redirect('/penulis');
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'nm_penulis' => ['required', 'string'],
            'tgl_lahir' => ['required'],
            'jn_kelamin' => ['required'],
            'ket' => ['required']
        ]);

        $tobeUpdated = Penulis::find($id);
        $user = Auth::user();

        $update = $tobeUpdated->update([
            'nm_penulis'=> $validated["nm_penulis"],
            'tgl_lahir'=>$validated["tgl_lahir"],
            'jn_kelamin'=>$validated["jn_kelamin"],
            'ket'=>$validated["ket"],
            'created_by'=>$user->id,   
        ]);

        if(!$update){
            return back()->withErrors(['create' => 'Gagal menyimpan Penulis!']);
        }

        return redirect('/penulis');

    }

    public function delete($id) {
        try{

            $tobeDeleted = Penulis::find($id);

            $tobeDeleted->delete();
    
            return redirect('/penulis');

        }catch(Exception $e){
            return back()->withErrors($e);
        }
    }
}