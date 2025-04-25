<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;

// ✅ Página inicial: Redirige al login si no está autenticado
Route::get('/', function () {
    return redirect()->route('login');
})->name('home');

// ✅ Rutas de autenticación
Route::get('/login', [AuthController::class, 'showLogin'])->name('login'); // Mostrar formulario de login
Route::post('/login', [AuthController::class, 'login']);                    // Procesar login

Route::get('/admin/usuarios', [AuthController::class, 'adminUsuarios'])
    ->middleware('auth')
    ->name('admin.usuarios');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register'); // Mostrar formulario de registro
Route::post('/register', [AuthController::class, 'register']);                      // Procesar registro

Route::get('/check-username', function(Request $request) {
    $exists = User::where('name', $request->username)->exists();
    return response()->json(['available' => !$exists]);
})->middleware('web');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');         // Cerrar sesión

// ✅ Perfil público de usuarios (requiere estar logueado)
Route::get('/usuarios/{usuario}', [ProfileController::class, 'show'])
    ->middleware('auth')
    ->name('usuarios.perfil');

// ✅ Perfil personal (editar y actualizar, requiere estar logueado)
Route::get('/perfil/editar', [ProfileController::class, 'edit'])
    ->middleware('auth')
    ->name('perfil.edit');

Route::post('/perfil/editar', [ProfileController::class, 'update'])
    ->middleware('auth')
    ->name('perfil.update');

// Página inicial protegida
Route::get('/inicio', [HomeController::class, 'index'])->middleware('auth')->name('inicio');

Route::post('/posts', [PostController::class, 'store'])->name('posts.store')->middleware('auth');

Route::post('/posts/{post}/comentarios', [ComentarioController::class, 'store'])->name('comentarios.store')->middleware('auth');
Route::post('/posts/{post}/like', [LikeController::class, 'toggle'])->name('posts.like')->middleware('auth');

// Visitar el perfil de un usuario
Route::get('/usuarios/{user}', [UserController::class, 'show'])->name('usuarios.show');
Route::post('/usuarios/{user}/follow', [UserController::class, 'follow'])->middleware('auth')->name('usuarios.follow');

Route::post('/seguir/{usuario}', [\App\Http\Controllers\SeguidorController::class, 'seguir'])->name('usuarios.seguir');
Route::delete('/seguir/{usuario}', [\App\Http\Controllers\SeguidorController::class, 'dejarDeSeguir'])->name('usuarios.dejar');

Route::get('/usuarios/{usuario}', [UserController::class, 'show'])->name('usuarios.show');
