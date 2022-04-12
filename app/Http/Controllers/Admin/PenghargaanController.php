<?php

namespace App\Http\Controllers\Admin;

use App\Models\Penghargaan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PenghargaanController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:penghargaans.index|penghargaans.create|penghargaans.edit|penghargaans.delete']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penghargaans = Penghargaan::latest()->when(request()->q, function($penghargaans) {
            $penghargaans = $penghargaans->where('title', 'like', '%'. request()->q . '%');
        })->paginate(10);

        return view('admin.penghargaan.index', compact('penghargaans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.penghargaan.create');
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
            'jdl_penghargaan'     => 'required',
            'desc_penghargaan'   => 'required',
            'image'     => 'required|image',
            'tgl_penghargaan'      => 'required'
        ]);

         //upload image
         $image = $request->file('image');
         $image->storeAs('public/penghargaan', $image->hashName());

        $penghargaan = Penghargaan::create([
            'jdl_penghargaan'     => $request->input('jdl_penghargaan'),
            'desc_penghargaan'   => $request->input('desc_penghargaan'),
            'tgl_penghargaan'      => $request->input('tgl_penghargaan'),
            'image'     => $image->hashName(),
        ]);

        if($penghargaan){
            //redirect dengan pesan sukses
            return redirect()->route('admin.penghargaan.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.penghargaan.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Penghargaan $penghargaan)
    {
        return view('admin.penghargaan.edit', compact('penghargaan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penghargaan $penghargaan)
    {
        $this->validate($request, [
            'jdl_penghargaan'     => 'required',
            'desc_penghargaan'   => 'required',
            'tgl_penghargaan'      => 'required',
            'image'     => 'required|image',
            
        ]);

        if ($request->file('image') == "") {
        
            $penghargaan = Penghargaan::findOrFail($penghargaan->id);
            $penghargaan->update([
                'jdl_penghargaan'       => $request->input('jdl_penghargaan'),
                'desc_penghargaan' => $request->input('desc_penghargaan'),
                'tgl_penghargaan'      => $request->input('tgl_penghargaan')
            ]);

        } else {

            //remove old image
            Storage::disk('local')->delete('public/penghargaan/'.$penghargaan->image);

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/penghargaan', $image->hashName());

            $penghargaan = Penghargaan::findOrFail($penghargaan->id);
            $penghargaan->update([
                'image'       => $image->hashName(),
                'jdl_penghargaan'       => $request->input('jdl_penghargaan'),
                'desc_penghargaan' => $request->input('desc_penghargaan'),
            ]);

        }

        if($penghargaan){
            //redirect dengan pesan sukses
            return redirect()->route('admin.penghargaan.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.penghargaan.index')->with(['error' => 'Data Gagal Diupdate!']);
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
        $penghargaan = Penghargaan::findOrFail($id);
        $penghargaan->delete();

        if($penghargaan){
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
