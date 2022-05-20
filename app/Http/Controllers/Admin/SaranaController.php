<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sarana;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SaranaController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:saranas.index|saranas.create|saranas.edit|saranas.delete']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $saranas = Sarana::latest()->when(request()->q, function($saranas) {
            $saranas = $saranas->where('nama_sarana', 'like', '%'. request()->q . '%');
        })->paginate(10);

        return view('admin.sarana.index', compact('saranas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sarana.create');
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
            'nama_sarana'     => 'required',
            'desc_sarana'   => 'required',
            'image'     => 'required|image',
        ]);

                //upload image
                $image = $request->file('image');
                $image->storeAs('public/sarana', $image->hashName());
        
        $sarana = Sarana::create([
            'nama_sarana' => $request->input('nama_sarana'),
            'desc_sarana'   => $request->input('desc_sarana'),
            'image'     => $image->hashName(),
            // dd($request->all())
            
        ]);

        if($sarana){
            //redirect dengan pesan sukses
            return redirect()->route('admin.sarana.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.sarana.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Sarana $sarana)
    {
        return view('admin.sarana.edit', compact('sarana'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sarana $sarana)
    {
        $this->validate($request, [
            'nama_sarana'     => 'required',
            'desc_sarana'   => 'required',
            'image'     => 'required|image',
            
        ]);

        if ($request->file('image') == "") {
        
            $sarana = Sarana::findOrFail($sarana->id);
            $sarana->update([
                'nama_sarana'       => $request->input('nama_sarana'),
                'desc_sarana' => $request->input('desc_sarana'),
            ]);

        } else {

            //remove old image
            Storage::disk('local')->delete('public/sarana/'.$sarana->image);

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/sarana', $image->hashName());

            $sarana = Sarana::findOrFail($sarana->id);
            $sarana->update([
                'image'       => $image->hashName(),
                'nama_sarana'       => $request->input('nama_sarana'),
                'desc_sarana' => $request->input('desc_sarana'),
            ]);

        }

        if($sarana){
            //redirect dengan pesan sukses
            return redirect()->route('admin.sarana.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.sarana.index')->with(['error' => 'Data Gagal Diupdate!']);
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
        $sarana = Sarana::findOrFail($id);
        $sarana->delete();

        if($sarana){
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
