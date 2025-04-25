<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show(User $usuario)
    {
        // Publicaciones del usuario con relaciones de likes y comentarios
        $publicaciones = $usuario->posts()
            ->withCount('likes', 'comentarios')
            ->latest()
            ->get();
    
        // Listas de seguidores y seguidos
        $seguidoresLista = $usuario->seguidores()->get();
        $seguidosLista = $usuario->seguidos()->get();        
    
        // Cantidades
        $seguidores = $seguidoresLista->count();
        $seguidos = $seguidosLista->count();
    
        return view('perfil.show', compact(
            'usuario',
            'publicaciones',
            'seguidores',
            'seguidos',
            'seguidoresLista',
            'seguidosLista'
        ));
    }

    public function follow(User $user)
    {
        $follower = Auth::user();

        if ($follower->id === $user->id) {
            return redirect()->back()->with('error', 'No puedes seguirte a ti mismo.');
        }

        if (!$follower->siguiendo->contains($user->id)) {
            $follower->seguidos()->attach($user->id);
        }

        return redirect()->back()->with('success', 'Has comenzado a seguir a ' . $user->name);
    }
}
