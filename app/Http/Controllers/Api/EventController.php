<?php

namespace App\Http\Controllers\Api;
use App\Models\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->take(2)->get();
        return response()->json([
            "response" => [
                "status"    => 200,
            ],
            "data" => $events
        ], 200);
    }
}
