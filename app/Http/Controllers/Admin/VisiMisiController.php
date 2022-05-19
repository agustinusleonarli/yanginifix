<?php

namespace App\Http\Controllers\Admin;

use App\Models\VisiMisi;
use App\Models\Prodi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VisiMisiController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:visimisis.index|visimisis.create|visimisis.edit|visimisis.delete']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visimisis = VisiMisi::latest()->when(request()->q, function($visimisis) {
            $visimisis = $visimisis->where('title', 'like', '%'. request()->q . '%');
        })->paginate(10);

        return view('admin.visimisi.index', compact('visimisis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prodis= Prodi::latest()->get();
        return view('admin.visimisi.create', compact('prodis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'katasambutan'     => 'required',
            'visi'   => 'required',
            'misi'  => 'required',
            
        ]);

        $visimisi = VisiMisi::create([
            'katasambutan' => $request->input('katasambutan'),
            'visi'   => $request->input('visi'),
            'misi'  => $request->input('misi'),
            'prodi_id' => $request->input('prodi_id'),
        
            
        ]);

        if($visimisi){
            //redirect dengan pesan sukses
            return redirect()->route('admin.visimisi.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.visimisi.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(VisiMisi $visimisi)

    {
        $prodis = Prodi::latest()->get(); 
        return view('admin.visimisi.edit', compact('visimisi', 'prodis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VisiMisi $visimisi)
    {
        $this->validate($request, [
            'katasambutan'     => 'required',
            'visi'   => 'required',
            'misi'  => 'required',
            'prodi_id' => 'required'
            
        ]);

        $visimisi = VisiMisi::findOrFail($visimisi->id);
        $visimisi->update([
            'katasambutan'     => $request->input('katasambutan'),
            'visi'  => $request->input('visi'),
            'misi'      => $request->input('misi'),
            'prodi_id' => $request->input('prodi_id')
        ]);

        if($visimisi){
            //redirect dengan pesan sukses
            return redirect()->route('admin.visimisi.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.visimisi.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visimisi = VisiMisi::findOrFail($id);
        $visimisi->delete();

        if($visimisi){
            return response()->json([
                'status' => 'success'
            ]);
        }else{
            return response()->json([
                'status' => 'error'
            ]);
        }
    }
}
