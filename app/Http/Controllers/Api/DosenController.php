<?php

namespace App\Http\Controllers\Api;
use App\Models\Dosen;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        // $dosens = Dosen::latest()->paginate(6);
        $dosens= Dosen::latest()->get();
        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "List Data Dosen"
            ],
            "data" => $dosens
        ], 200);
    }
    
    /**
     * Data Dosen ALL
     *
     * @return void
     */
    public function test($id)
    {
        $dosens= Dosen::with('prodi')->where('prodi_id',$id) ->get();
        return response()->json([
            'succes' => true,
            'message' => "Data Prodi",
            'data' => $dosens
        ], 200);
    }

}
