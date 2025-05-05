<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'contenido' => 'required|string|max:1000',
        ]);

        Post::create([
            'user_id' => Auth::id(),
            'contenido' => $request->contenido,
        ]);

        return redirect()->route('inicio')->with('success', '¡Publicación realizada!'); //Inicio
    }
}
