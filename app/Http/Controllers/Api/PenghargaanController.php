<?php

namespace App\Http\Controllers\Api;
use App\Models\Penghargaan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PenghargaanController extends Controller
{
    public function index()
    {
        // $dosens = Dosen::latest()->paginate(6);
        $penghargaans = Penghargaan::latest()->take(2)->get();
        return response()->json([
            "response" => [
                "status"    => 200,
                // "message"   => "List Data Dosen"
            ],
            "data" => $penghargaans
        ], 200);
    }
    
    /**
     * Data Dosen ALL
     *
     * @return void
     */
    public function DataDosen()
    {
        $penghargaans = Penghargaan::latest()->take(2)->get();
        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "List Data Dosen"
            ],
            "data" => $penghargaans
        ], 200);
    }
}
