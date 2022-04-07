<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dosen;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DosenController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:dosens.index|dosens.create|dosens.edit|dosens.delete']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dosens = Dosen::latest()->when(request()->q, function($dosens) {
            $dosens = $dosens->where('title', 'like', '%'. request()->q . '%');
        })->paginate(10);

        return view('admin.dosen.index', compact('dosens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dosen.create');
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
            'dosen_nama'     => 'required',
            'dosen_notelp'   => 'required',
            'dosen_alamat'  => 'required',
            'dosen_deskripsi'  => 'required',
            'image'     => 'required|image',
            
        ]);

                //upload image
                $image = $request->file('image');
                $image->storeAs('public/photos', $image->hashName());
        
        $dosen = Dosen::create([
            'dosen_nama' => $request->input('dosen_nama'),
            'dosen_notelp'   => $request->input('dosen_notelp'),
            'dosen_alamat'   => $request->input('dosen_alamat'),
            'dosen_deskripsi'  =>$request->input('dosen_deskripsi'),
            'image'     => $image->hashName(),
            // dd($request->all())
            
        ]);

        if($dosen){
            //redirect dengan pesan sukses
            return redirect()->route('admin.dosen.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.dosen.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Dosen $dosen)
    {
        return view('admin.dosen.edit', compact('dosen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dosen $dosen)
    {
        $this->validate($request, [
            'dosen_nama'     => 'required',
            'dosen_notelp'   => 'required',
            'dosen_alamat'  => 'required',
            'dosen_deskripsi'  => 'required',
            'image'     => 'required|image',
            
        ]);

        if ($request->file('image') == "") {
        
            $dosen = Dosen::findOrFail($dosen->id);
            $dosen->update([
                'dosen_nama'       => $request->input('dosen_nama'),
                'dosen_notelp' => $request->input('dosen_notelp'),
                'dosen_alamat'     => $request->input('dosen_alamat'),  
                'dosen_deskripsi'     => $request->input('dosen_deskripsi')  
            ]);

        } else {

            //remove old image
            Storage::disk('local')->delete('public/photos/'.$dosen->image);

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/photos', $image->hashName());

            $dosen = Dosen::findOrFail($dosen->id);
            $dosen->update([
                'image'       => $image->hashName(),
                'dosen_nama'       => $request->input('dosen_nama'),
                'dosen_notelp' => $request->input('dosen_notelp'),
                'dosen_alamat'     => $request->input('dosen_alamat'),  
                'dosen_deskripsi'     => $request->input('dosen_deskripsi')  
            ]);

        }

        if($dosen){
            //redirect dengan pesan sukses
            return redirect()->route('admin.dosen.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.dosen.index')->with(['error' => 'Data Gagal Diupdate!']);
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
        $dosen = Dosen::findOrFail($id);
        $dosen->delete();

        if($dosen){
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
