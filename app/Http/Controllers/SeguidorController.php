<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;

class SeguidorController extends Controller
{
    public function seguir(User $usuario)
    {
        $user = Auth::user();

        if ($user->id !== $usuario->id && !$user->estaSiguiendo($usuario)) {
            $user->seguidos()->attach($usuario->id);
            
            // Crear notificación
            $usuario->createNotification('follow', [
                'follower_id' => $user->id,
                'follower_name' => $user->name
            ]);
        }

        return redirect()->back();
    }

    public function dejarDeSeguir(User $usuario)
    {
        $user = Auth::user();

        if ($user->id !== $usuario->id && $user->estaSiguiendo($usuario)) {
            $user->seguidos()->detach($usuario->id);
        }

        return redirect()->back();
    }
}
