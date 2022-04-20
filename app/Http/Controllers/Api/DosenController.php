<?php

namespace App\Http\Controllers\Api;
use App\Models\Dosen;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $dosens = Dosen::latest()->paginate(6);
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
    public function DataDosen()
    {
        $dosens = Dosen::latest()->take(2)->get();
        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "List Data Dosen"
            ],
            "data" => $dosens
        ], 200);
    }

}
