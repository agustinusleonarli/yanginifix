<?php

namespace App\Http\Controllers\Api;
use App\Models\Kurikulum;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KurikulumController extends Controller
{
    public function index()
    {
        // $saranas = Sarana::latest()->paginate(6);
        $kurikulums = Kurikulum::latest()->get();
        return response()->json([
            "response" => [
                "status"    => 200,
                // "message"   => ""
            ],
            "data" => $kurikulums
        ], 200);
    }
}
