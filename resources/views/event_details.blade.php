<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Evento</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:rgb(14, 17, 19);
            margin: 0;
            padding: 0;
            color: white;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color:rgba(54, 54, 59, 0.74);
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
        .event-details {
            padding: 10px;
        }
        .event-card {
            background-color: rgba(48, 48, 48, 0.77);
            padding: 20px;
            margin: 30px;
            color: white;
            border-radius: 10px;
            cursor: pointer;
        }
        .event-card h2 {
            margin: 0;
            font-size: 20px;
        }
        .event-card h3 {
            margin: 0;
            font-size: 20px;
        }
        .map {
            width: 100%;
            height: 200px;
            background: gray;
            margin-top: 10px;
        }
        .img_header{
            width: 160px;
        }
        .img_header1{
            width: 30px;
        }
        .comment-section {
            margin-top: 30px;
            padding: 10px;
            background-color: rgba(109, 64, 255, 0.778);
            border-radius: 10px;
        }
        .comment-section h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }
        .comment-box {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            background-color: #333;
            color: white;
            border: none;
        }
        .comment-list {
            margin-top: 20px;
        }
        .comment-item {
            background-color: #444;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }
        .comment-item strong {
            display: block;
            color: #f0f0f0;
        }
        .link a {
            color:rgb(152, 176, 199);
            text-decoration: none;
        }
        
    </style>
</head>
<body>
<div class="header" >
    <span class="link">👤 <a href="{{ route('profile.show') }}">{{ Auth::user()->name }}</a></span>
        <h1><a href="{{ route('index') }}"><img class="img_header" src="https://i.ibb.co/KjB2J0DH/Comm-3-removebg-preview.png" alt="Community App"></a></h1>
        <div class="icons">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button style="background: none; border: none; color: white; cursor: pointer;">🚪 Cerrar sesión</button>
            </form>
        </div>
    </div>
    
        <div class="event-card ">
            <h2>{{ $event->titulo }}</h2>
            <p>{{ $event->descripcion }}</p>
            <p><strong>Organizador:</strong> {{ $event->organizador }}</p>
            <p><strong>Costo:</strong> ${{ $event->costo }}</p>
            <p><strong>Categoría:</strong> {{ $event->tematica }}</p>
            <p><strong>Edad mínima:</strong> {{ $event->edad_minima }}</p>
            <p><strong>Ubicación:</strong> {{ $event->ubicacion }}</p>
            <p><strong>Fecha del evento:</strong> {{ $event->fecha }}</p>
            <p><strong>Hora de inicio:</strong> {{ $event->hora }}</p>
            <p><strong>Contacto:</strong> {{ $event->contacto }}</p>
        </div>

    </div>
</body>
</html>

