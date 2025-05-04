<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show(User $usuario)
    {
        $publicaciones = $usuario->posts()->latest()->get();
        $seguidores = $usuario->seguidores()->count();
        $seguidos = $usuario->seguidos()->count();

        return view('perfil.show', compact('usuario', 'publicaciones', 'seguidores', 'seguidos'));
    }

    public function edit()
    {
        /** @var User $usuario */
        $usuario = Auth::user(); // ✅ Cambia el nombre aquí también
    
        return view('perfil.edit', compact('usuario')); // ✅ Ahora sí existe $usuario
    }

    public function update(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();
    
        $request->validate([
            'bio' => 'nullable|string|max:1000',
            'foto_perfil' => 'nullable|image|max:2048',
            'equipo_favorito' => 'nullable|string|max:100',
        ]);
    
        if ($request->hasFile('foto_perfil')) {
            $path = $request->file('foto_perfil')->store('fotos_perfil', 'public');
            $user->foto_perfil = $path;
        }
    
        $user->bio = $request->bio;
        $user->equipo_favorito = $request->input('equipo_favorito');
        $user->save();
    
        return redirect()->route('perfil.update', $user->id)->with('success', 'Perfil actualizado');
    }    
}
