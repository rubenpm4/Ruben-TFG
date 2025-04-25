<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class ComentarioController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'contenido' => 'required|string|max:1000',
        ]);
    
        /** @var User $usuario */
        $usuario = Auth::user();
    
        $post->comentarios()->create([
            'user_id' => $usuario->id,
            'contenido' => $request->contenido,
        ]);
    
        return redirect()->back();
    }
}