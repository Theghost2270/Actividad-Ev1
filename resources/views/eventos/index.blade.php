@extends('layouts.app')

@section('title', 'Community App')

@section('content')

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #1a1a1a;
        color: black;
        margin: 0;
        padding: 0;
    }
    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #6a0dad;
        padding: 10px 20px;
    }
    .header h1 {
        margin: 0;
        font-size: 18px;
    }
    .icons {
        display: flex;
        gap: 15px;
    }
    .search-container {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px;
        background-color: #333;
        border-radius: 5px;
        margin: 10px;
    }
    .search-container input {
        flex: 1;
        padding: 10px;
        border: none;
        border-radius: 5px;
        background-color: #222;
        color: white;
    }
    .search-container button {
        background-color: transparent;
        border: none;
        color: white;
        font-size: 18px;
        cursor: pointer;
    }
    .event-list {
        padding: 10px;
    }
    .event-item {
        background-color: #8a2be2;
        padding: 15px;
        margin: 10px;
        border-radius: 10px;
        cursor: pointer;
    }
    .event-item h2 {
        margin: 0 0 10px;
        font-size: 16px;
    }
    .event-item p {
        margin: 5px 0;
        font-size: 14px;
    }
    .event-item strong {
        display: block;
    }
</style>

<div class="header">
    <span>👤</span>
    <h1>Community App</h1>
    <div class="icons">
        <a href="{{ url('event-creation') }}">➕</a>
    </div>
</div>

<div class="search-container">
    <input type="text" placeholder="Buscar eventos...">
    <button>🔍</button>
    <button>⚙</button>
</div>

<div class="event-list">
    <div class="event-item" onclick="location.href='{{ url('event-details') }}'">
        <h2>Aplicar las 3R's en nuestra cotidianidad</h2>
        <p>Podrás aprender de manera práctica a Reducir, Reciclar y Reutilizar de formas que te beneficien y beneficien al planeta.</p>
        <p><strong>Organizador:</strong> Juan Soto</p>
        <p><strong>Costo:</strong> Gratuito</p>
        <p><strong>Categoría:</strong> Impacto ambiental</p>
        <p><strong>Edad mínima:</strong> Ninguna</p>
    </div>
    <div class="event-item" onclick="location.href='{{ url('event-details') }}'">
        <h2>Taller de reciclaje creativo</h2>
        <p>Podrás aprender de manera práctica a Reducir, Reciclar y Reutilizar de formas que te beneficien y beneficien al planeta.</p>
        <p><strong>Organizador:</strong> Juan Soto</p>
        <p><strong>Costo:</strong> Gratuito</p>
        <p><strong>Categoría:</strong> Impacto ambiental</p>
        <p><strong>Edad mínima:</strong> Ninguna</p>
    </div>
    <div class="event-item" onclick="location.href='{{ url('event-details') }}'">
        <h2>Charla sobre impacto ambiental</h2>
        <p>Podrás aprender de manera práctica a Reducir, Reciclar y Reutilizar de formas que te beneficien y beneficien al planeta.</p>
        <p><strong>Organizador:</strong> Juan Soto</p>
        <p><strong>Costo:</strong> Gratuito</p>
        <p><strong>Categoría:</strong> Impacto ambiental</p>
        <p><strong>Edad mínima:</strong> Ninguna</p>
    </div>
</div>

@endsection
