<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function banear($id)
    {
        $user = User::findOrFail($id);
        
        if ($user->email === '159paradas@gmail.com') {
            return redirect()->back()->with('error', 'No puedes banear a este usuario');
        }

        $user->update(['baneado' => true]);
        
        // Forzar recarga de la página
        return redirect()->route('admin.dashboard')->with('success', 'Usuario baneado correctamente');
    }
}
