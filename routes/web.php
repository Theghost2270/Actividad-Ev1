<?php

use Illuminate\Support\Facades\Route;
use App\Models\Event;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\PreguntaController;
use App\Http\Controllers\ComentarioController;


Route::get('/', [EventController::class, 'index'])->name('home')->middleware('auth');

// Ruta de Login
Route::get('/login', function () {
    return view('layouts.log_in');
})->name('log_in');
// Procesar Login
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Ruta de sign-up
Route::get('/sign-up', function () {
    return view('layouts.sign_up');
})->name('sign_up');
// Ruta para procesar el formulario de registro
Route::post('/sign-up', [AuthController::class, 'register'])->name('sign_up.post');

// Cerrar sesión
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//ruta pagina principal
Route::middleware('auth')->group(function () {
Route::get('/index', [EventController::class, 'index'])->name('index');
});

//mostrar perfil 
Route::middleware('auth')->group(function () {
    Route::get('/perfil', [ProfileController::class, 'show'])->name('profile.show');
});

//mostrar eventos
Route::middleware('auth')->group(function () {
    Route::resource('events', EventController::class);
});

Route::post('events/{id_evento}/comentarios', [ComentarioController::class, 'store'])->name('comentarios.store');
Route::post('/eventos/{evento}', [ComentarioController::class, 'store'])->middleware('auth')->name('comentarios.store');


Route::delete('comentarios/{comentario}', [ComentarioController::class, 'destroy'])->name('comentarios.destroy');
Route::delete('events/{id_evento}', [EventController::class, 'destroy'])->where('id_evento', '.*')->name('events.destroy');

/*
Route::get('/event/create', [EventController::class, 'create'])->name('events.create')->middleware('auth');
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::post('/events', [EventController::class, 'store'])->name('events.store');


//Route::get('/events/create', [EventController::class, 'create'])->name('events.create');


// Crear evento
Route::get('/event/create', [EventController::class, 'create'])->name('event.create')->middleware('auth');


// Página principal con eventos


// Detalles del evento
//Route::get('/event/{id}', [EventController::class, 'show'])->name('event.details')->middleware('auth');




Route::middleware('auth:sanctum')->group(function () {
    Route::post('/eventos/{evento}/comentarios', [ComentarioController::class, 'store']);
});
Route::post('/eventos/{evento}/comentarios', [ComentarioController::class, 'store'])->name('comentarios.store');
Route::get('/eventos/{evento}/comentarios', [ComentarioController::class, 'index']);

*/

