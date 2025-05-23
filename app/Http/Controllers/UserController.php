<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show(User $usuario)
    {
        $publicaciones = $usuario->posts()
            ->withCount('likes', 'comentarios')
            ->latest()
            ->get();

        $seguidoresLista = $usuario->seguidores()->get();
        $seguidosLista = $usuario->seguidos()->get();        

        return view('perfil.show', [
            'usuario' => $usuario,
            'publicaciones' => $publicaciones,
            'seguidores' => $seguidoresLista->count(),
            'seguidos' => $seguidosLista->count(),
            'seguidoresLista' => $seguidoresLista,
            'seguidosLista' => $seguidosLista
        ]);
    }

    public function follow(User $user)
    {
        $follower = Auth::user();

        if ($follower->id === $user->id) {
            return back()->with('error', 'No puedes seguirte a ti mismo.');
        }

        if (!$follower->siguiendo->contains($user->id)) {
            $follower->seguidos()->attach($user->id);
            return back()->with('success', 'Ahora sigues a ' . $user->name);
        }

        return back();
    }

    public function ban($id)
    {
        $user = User::findOrFail($id);
        
        if ($user->email === '159paradas@gmail.com') {
            return back()->with('error', 'No puedes banear a este usuario');
        }

        $user->update(['baneado' => true]);
        return back()->with('success', 'Usuario baneado correctamente');
    }
}