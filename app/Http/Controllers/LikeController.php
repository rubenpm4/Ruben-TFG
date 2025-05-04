<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;

class LikeController extends Controller
{
    public function toggle(Post $post)
    {
        /** @var User $usuario */
        $usuario = Auth::user();
    
        if ($post->likes()->where('user_id', $usuario->id)->exists()) {
            $post->likes()->where('user_id', $usuario->id)->delete();
        } else {
            $post->likes()->create(['user_id' => $usuario->id]);
        }
    
        return redirect()->back();
    }
}
