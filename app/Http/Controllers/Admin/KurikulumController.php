<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kurikulum;
use App\Models\Prodi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KurikulumController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:kurikulums.index|kurikulums.create|kurikulums.edit|kurikulums.delete']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kurikulums = Kurikulum::latest()->when(request()->q, function($kurikulums) {
            $kurikulums = $kurikulums->where('title', 'like', '%'. request()->q . '%');
        })->paginate(10);

        return view('admin.kurikulum.index', compact('kurikulums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prodis = Prodi::latest()->get();
        return view('admin.kurikulum.create', compact('prodis'));
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
            'sem_matkul'     => 'required',
            'nama_matkul'   => 'required',
            'sks_matkul'  => 'required',
            'prodi_id' => 'required'
            
        ]);

        $kurikulum = Kurikulum::create([
            'sem_matkul' => $request->input('sem_matkul'),
            'nama_matkul'   => $request->input('nama_matkul'),
            'sks_matkul'  => $request->input('sks_matkul'),
            'prodi_id' => $request->input('prodi_id')
            // dd($request->all())
            
        ]);

        if($kurikulum){
            //redirect dengan pesan sukses
            return redirect()->route('admin.kurikulum.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.kurikulum.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kurikulum $kurikulum)
    {
        $prodis = Prodi::latest()->get();
        return view('admin.kurikulum.edit', compact('kurikulum', 'prodis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kurikulum $kurikulum)
    {
        $this->validate($request, [
            'sem_matkul'     => 'required',
            'nama_matkul'   => 'required',
            'sks_matkul'  => 'required',
            'prodi_id' => 'required'
            
        ]);

        $kurikulum = Kurikulum::findOrFail($kurikulum->id);
        $kurikulum->update([
            'sem_matkul'     => $request->input('sem_matkul'),
            'nama_matkul'  => $request->input('nama_matkul'),
            'sks_matkul'      => $request->input('sks_matkul'),
            'prodi_id' => $request->input('prodi_id')
        ]);

        if($kurikulum){
            //redirect dengan pesan sukses
            return redirect()->route('admin.kurikulum.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.kurikulum.index')->with(['error' => 'Data Gagal Diupdate!']);
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
        $kurikulum = Kurikulum::findOrFail($id);
        $kurikulum->delete();

        if($kurikulum){
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
