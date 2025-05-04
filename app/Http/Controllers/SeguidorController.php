<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SeguidorController extends Controller
{
    /**
     * Seguir a un usuario.
     */
    public function seguir(User $usuario)
    {
        $user = Auth::user();

        if ($user->id !== $usuario->id && !$user->estaSiguiendo($usuario)) {
            $user->seguidos()->attach($usuario->id);
        }

        return redirect()->back();
    }

    /**
     * Dejar de seguir a un usuario.
     */
    public function dejarDeSeguir(User $usuario)
    {
        $user = Auth::user();

        if ($user->id !== $usuario->id && $user->estaSiguiendo($usuario)) {
            $user->seguidos()->detach($usuario->id);
        }

        return redirect()->back();
    }
}
