<?php

namespace App\Http\Controllers\Api;
use App\Models\Sarana;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SaranaController extends Controller
{
    public function index()
    {
        // $saranas = Sarana::latest()->paginate(6);
        $saranas = Sarana::latest()->get();
        return response()->json([
            "response" => [
                "status"    => 200,
                // "message"   => "List Data Dosen"
            ],
            "data" => $saranas
        ], 200);
    }
    
    /**
     * Data Dosen ALL
     *
     * @return void
     */
    public function test($id)
    {
        $saranas= Sarana::with('prodi')->where('prodi_id',$id) ->get();
        return response()->json([
            'succes' => true,
            'message' => "Data Sarana",
            'data' => $saranas
        ], 200);
    }
}
