<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use App\Models\Notification;

class LikeController extends Controller
{
    public function toggle(Post $post)
    {
        /** @var User $usuario */
        $usuario = Auth::user();
    
        if ($post->likes()->where('user_id', $usuario->id)->exists()) {
            $post->likes()->where('user_id', $usuario->id)->delete();
        } else {
            $like = $post->likes()->create(['user_id' => $usuario->id]);
            
            // Crear notificación solo si no es el dueño del post
            if ($post->user_id != $usuario->id) {
                $post->user->createNotification('like', [
                    'liker_id' => $usuario->id,
                    'liker_name' => $usuario->name,
                    'post_id' => $post->id
                ]);
            }
        }
    
        return redirect()->back();
    }
}