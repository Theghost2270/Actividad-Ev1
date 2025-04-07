<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community App</title>
    <style>
        body {
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #1a1a1a;
            color: rgb(255, 255, 255);
            margin: 0;
            padding: 0;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: rgba(106, 41, 236, 0.864);
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
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 14px;
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
            background-color: rgba(109, 64, 255, 0.778);
            padding: 20px;
            margin: 30px;
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
        .img_header{
            width: 160px;
        }
        .img_header1{
            width: 30px;
        }
    </style>
</head>
<body>
    <div class="header">
        <span>👤 {{ Auth::user()->name }}</span>
        <h1><a href="#"><img class="img_header" src="https://i.ibb.co/KjB2J0DH/Comm-3-removebg-preview.png" alt="Community App"></a></h1>
        <div class="icons">
            <a href="{{ route('event.create') }}"><img class="img_header1" src="https://cdn-icons-png.flaticon.com/128/1237/1237946.png" alt="Crear Evento"></a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button style="background: none; border: none; color: white; cursor: pointer;">🚪 Cerrar sesión</button>
            </form>
        </div>
    </div>

    <div class="search-container">
        <input type="text" placeholder="Buscar eventos...">
        <button>🔍</button>
        <button>⚙</button>
    </div>
     
    @section('content')

<div class="container">
    <h1>Lista de Eventos</h1>
    <a href="{{ route('events.create') }}" class="btn btn-primary">Crear Nuevo Evento</a>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <div class="event-list">
    @foreach ($events as $event)
    <div class="event-item">
        <h2>{{ $event->titulo }}</h2>
        <p>{{ $event->descripcion }}</p>
        <p><strong>Costo:</strong> ${{ $event->costo }}</p>
        <p><strong>Edad mínima:</strong> {{ $event->edad_minima }}</p>
        <p><strong>Categoría:</strong> {{ $event->tematica }}</p>
        <p><strong>Usuario:</strong> {{ $event->organizador }}</p>
    </div>
    @endforeach
</div>

@endsection
</body>
</html>
