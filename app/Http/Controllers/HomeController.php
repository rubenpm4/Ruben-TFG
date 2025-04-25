<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        // Obtener todas las publicaciones ordenadas por recientes
        $posts = Post::with('user')->latest()->get();
        return view('inicio', compact('posts'));
    }
}
