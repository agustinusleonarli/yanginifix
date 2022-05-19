<?php

namespace App\Http\Controllers\Api;
use App\Models\VisiMisi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    public function index()
    {
        // $saranas = Sarana::latest()->paginate(6);
        $visimisis = VisiMisi::latest()->get();
        return response()->json([
            "response" => [
                "status"    => 200,
                // "message"   => ""
            ],
            "data" => $visimisis
        ], 200);
    }
    
    /**
     * Data Dosen ALL
     *
     * @return void
     */
    public function test($id)
    {
        // $visimisis = VisiMisi::with('prodis')-> where('prodi_id') ->get();
        // $visimisis= VisiMisi::findOrfail($id);
        // $visimisis = VisiMisi::with('prodis')-> where('nama_prodi',$id) ->get();
        // Visimisi::with('prodi') ->get()
        
        $visimisis=Visimisi::with('prodi')->where('prodi_id',$id) ->get();
        return response()->json([
            'succes' => true,
            'message' => "Data Prodi",
            'data' => $visimisis
        ], 200);
    }
}
