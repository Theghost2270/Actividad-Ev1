<?php

use Illuminate\Support\Facades\Route;
use App\Models\Evento;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\PreguntaController;

Route::get('/', [EventController::class, 'index'])->name('home');

/*Route::get('/', function () {
    return view('welcome'); // Asegúrate de que la vista está en resources/views/auth/login.blade.php
})->name('sign_in');*/


// Ruta de Login
Route::get('/log-in', function () {
    return view('layouts.log_in');
})->name('log_in');
// Procesar Login
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/sign-up', function () {
    return view('layouts.sign_up');
})->name('sign_up');

// Ruta para procesar el formulario de registro
Route::post('/sign-up', [AuthController::class, 'register'])->name('sign_up.post');

// Cerrar sesión
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
Route::post('/events', [EventController::class, 'store'])->name('events.store');

// Crear evento
Route::get('/event/create', [EventController::class, 'create'])->name('event.create')->middleware('auth');

// Página principal con eventos
Route::get('/index', [EventController::class, 'index'])->name('index')->middleware('auth');

// Detalles del evento
Route::get('/event/{id}', [EventController::class, 'show'])->name('event.details')->middleware('auth');
