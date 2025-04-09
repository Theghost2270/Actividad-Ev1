<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil</title>
    <style>
        /* Estilos para el perfil */
        body {
            font-family: Arial, sans-serif;
            background-color:rgb(14, 17, 19);
            margin: 0;
            padding: 0;
            color: white;
        }
        .header {
            color: white;
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
        .container {
            background-color: rgba(48, 48, 48, 0.77);
            padding: 20px;
            margin: 30px;
            color: white;
            border-radius: 10px;
            cursor: pointer;;
        }
        .event-list {
            margin-top: 20px;
        }
        .event-item {
            background-color:rgba(21, 25, 29, 0.74);
            padding: 20px;
            margin: 30px;
            color: white;
            border-radius: 10px;
            cursor: pointer;
        }
        .event-item h3 {
            margin: 0;
            font-size: 20px;
        }
        
        .img_header{
            width: 160px;
        }
        .img_header1{
            width: 30px;
        }
        .link a {
            color:rgb(152, 176, 199);
            text-decoration: none;
        }
        .button {
            width: 100%;
            padding: 10px;
            background-color: black;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="header" >
    <span class="link">👤 <a href="{{ route('profile.show') }}">{{ Auth::user()->name }}</a></span>
        <h1><a href="{{ route('index') }}"><img class="img_header" src="https://i.ibb.co/KjB2J0DH/Comm-3-removebg-preview.png" alt="Community App"></a></h1>
        <div class="icons">
            
            <a href="{{ route('events.create') }}"><img class="img_header1" src="https://cdn-icons-png.flaticon.com/128/1237/1237946.png" alt="Crear Evento"></a>
            <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button style="background: none; border: none; color: white; cursor: pointer;">🚪 Cerrar sesión</button>
        </form>
        </div>
    </div>

    <div class="container">
        <h2>Información de Usuario</h2>
        <p><strong>Nombre:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
        <p>Teléfono: {{ auth()->user()->phone }}</p>
        
        <h2>Mis Eventos</h2>
        <div class="event-list">
            @if ($events->isEmpty())
                <p>No has creado ningún evento aún.</p>
            @else
                @foreach ($events as $event)
                    <div class="event-item">
                        <h4>{{ $event->titulo }}</h4>
                        <p>{{ $event->descripcion }}</p>
                        <p><strong>Costo:</strong> ${{ $event->costo }}</p>
                        <p><strong>Fecha:</strong> {{ $event->fecha }}</p>
                        <p><strong>Ubicación:</strong> {{ $event->ubicacion }}</p>
                        <p><strong>Contacto:</strong> {{ $event->contacto }}</p>
                        <span class="link"><a  href="{{ route('events.show', $event->id_evento) }}" >Ver detalles</a></span>
                        <form action="{{ route('events.destroy', $event->id_evento) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="button" type="submit">Eliminar</button>
                    </form>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

</body>
</html>
