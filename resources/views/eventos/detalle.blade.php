@extends('layouts.app')

@section('titulo', $evento->titulo)

@section('contenido')
    <h1 class="text-2xl font-bold">{{ $evento->titulo }}</h1>
    <p>{{ $evento->descripcion }}</p>
    <p><strong>Fecha:</strong> {{ $evento->fecha }} - {{ $evento->hora }}</p>
    <p><strong>Ubicación:</strong> {{ $evento->ubicacion }}</p>

    @auth
        <form action="/eventos/{{ $evento->id_evento }}/asistir" method="POST">
            @csrf
            <button class="bg-green-500 text-white px-4 py-2 mt-4">Asistir</button>
        </form>
    @endauth

    <h2 class="mt-6 text-xl">Preguntas</h2>
    @foreach ($evento->preguntas as $pregunta)
        <p><strong>{{ $pregunta->usuario->nombre }}:</strong> {{ $pregunta->pregunta }}</p>
        @if ($pregunta->respuesta)
            <p class="ml-4 text-green-600">Respuesta: {{ $pregunta->respuesta }}</p>
        @endif
    @endforeach

    @auth
        <form action="/eventos/{{ $evento->id_evento }}/preguntar" method="POST">
            @csrf
            <textarea name="pregunta" class="border p-2 w-full" placeholder="Haz una pregunta"></textarea>
            <button class="bg-blue-500 text-white px-4 py-2 mt-2">Enviar</button>
        </form>
    @endauth
@endsection
