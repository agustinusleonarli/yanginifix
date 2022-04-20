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
    public function DataSarana()
    {
        $saranas = Sarana::latest()->take(2)->get();
        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "List Data Sarana"
            ],
            "data" => $saranas
        ], 200);
    }
}
