<?php

namespace App\Http\Controllers\Api;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->take(2)->get();
        return response()->json([
            "response" => [
                "status"    => 200,
            ],
            "data" => $posts
        ], 200);
    }
}
