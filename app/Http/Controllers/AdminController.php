<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function banear($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->baneado = true;
        $usuario->save();

        return redirect()->route('admin.dashboard')->with('success', 'Usuario baneado correctamente.');
    }
}
