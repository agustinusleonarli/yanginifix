<?php

namespace App\Http\Controllers\Api;
use App\Models\Kurikulum;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KurikulumController extends Controller
{
    public function index()
    {
        
        $kurikulums= Kurikulum::latest()->get();
        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "List Data Kurikulum"
            ],
            "data" => $kurikulums
        ], 200);
    }

    public function test($id)
    {
        $kurikulums= Kurikulum::with('prodi')->where('prodi_id',$id) ->get();
        return response()->json([
            'succes' => true,
            'message' => "Data Kurikulum",
            'data' => $kurikulums
        ], 200);
    }
}
