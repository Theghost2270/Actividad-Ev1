<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\PreguntaController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);/*
Route::get('/eventos', [EventoController::class, 'index']);
Route::get('/eventos/{id}', [EventoController::class, 'show']);*/
Route::get('/eventos/{evento}/comentarios', [ComentarioController::class, 'index']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/eventos/{evento}/comentarios', [ComentarioController::class, 'store']);
    /*
    Route::post('/eventos', [EventoController::class, 'store']);
    Route::put('/eventos/{id}', [EventoController::class, 'update']);
    Route::delete('/eventos/{id}', [EventoController::class, 'destroy']);
    Route::post('/eventos/{id}/asistir', [AsistenciaController::class, 'asistir']);
    Route::delete('/eventos/{id}/cancelar-asistencia', [AsistenciaController::class, 'cancelarAsistencia']);
    Route::get('/eventos/{id}/asistentes', [AsistenciaController::class, 'asistentes']);
    Route::post('/eventos/{id}/preguntar', [PreguntaController::class, 'hacerPregunta']);
    Route::get('/eventos/{id}/preguntas', [PreguntaController::class, 'verPreguntas']);
    Route::post('/preguntas/{id}/responder', [PreguntaController::class, 'responderPregunta']);*/
});
