<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Notification;

class ComentarioController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'contenido' => 'required|string|max:1000',
        ]);
    
        /** @var User $usuario */
        $usuario = Auth::user();
    
        $comentario = $post->comentarios()->create([
            'user_id' => $usuario->id,
            'contenido' => $request->contenido,
        ]);
        
        // Crear notificación solo si no es el dueño del post
        if ($post->user_id != $usuario->id) {
            $post->user->createNotification('comment', [
                'commenter_id' => $usuario->id,
                'commenter_name' => $usuario->name,
                'post_id' => $post->id,
                'comment_id' => $comentario->id
            ]);
        }
    
        return redirect()->back();
    }
}