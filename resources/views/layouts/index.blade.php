
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community App</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:rgb(14, 17, 19);
            margin: 0;
            padding: 0;
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
        .search-container {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            background-color: rgba(21, 25, 29, 0.74);
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
            color: white;
        }
        .event-item {
            background-color:rgba(24, 26, 29, 0.74);
            padding: 20px;
            margin: 30px;
            color: white;
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
        .link a {
            color:rgb(152, 176, 199);
            text-decoration: none;
        }
        .button {
            width: 10%;
            padding: 5px;
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
@section('content')
<div class="header">
    <span class="link">👤 <a href="{{ route('profile.show') }}">{{ Auth::user()->name }}</a></span>
    <h1><a href="#"><img class="img_header" src="https://i.ibb.co/KjB2J0DH/Comm-3-removebg-preview.png" alt="Community App"></a></h1>
    <div class="icons">
        <a href="{{ route('events.create') }}"><img class="img_header1" src="https://cdn-icons-png.flaticon.com/128/1237/1237946.png" alt="Crear Evento"></a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button style="background: none; border: none; color: white; cursor: pointer;">🚪 Cerrar sesión</button>
        </form>
    </div>
</div>
<form  method="GET" action="{{ route('events.index') }}">
    <div style="color: White;" class="search-container">
    <label  for="tematica">Filtrar por temática:</label>
        <select name="tematica" id="tematica">
            <option value="">Selecciona una temática</option>
            @foreach($tematicas as $tematica)
                <option value="{{ $tematica->tematica }}" 
                        {{ request('tematica') == $tematica->tematica ? 'selected' : '' }}>
                    {{ $tematica->tematica }}
                </option>
            @endforeach
        </select>
        <input type="text" id="search" name="search" value="{{ request('search') }}" placeholder="Buscar evento...">
        <button type="submit">Filtrar</button>
    </div>
</form>
<div class="container">
@if(session('success'))
    <div id="successMessage" style="color: green;">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div id="errorMessage" style="color: red;">
        {{ session('error') }}
    </div>
@endif
    

    <div class="event-list">
        @if ($events->isEmpty())
            <p>No hay eventos disponibles aún.</p>
        @else
            @foreach ($events as $event)
                <div class="event-item">
                    <h2 class="link"><a  href="{{ route('events.show', $event->id_evento) }}">{{ $event->titulo }}</a></h2>
                    <p>{{ $event->descripcion }}</p>
                    <p><strong>Costo:</strong> ${{ $event->costo }}</p>
                    <p><strong>Edad mínima:</strong> {{ $event->edad_minima }}</p>
                    <p><strong>Categoría:</strong> {{ $event->tematica }}</p>
                    <p><strong>Organizador:</strong> {{ $event->organizador }}</p>
                    <p><strong>Publicado por:</strong> {{ $event->user ? $event->user->name : 'Desconocido' }}</p>
                    <p><strong>Contacto:</strong> {{ $event->contacto }}</p>
                    @if (auth()->check() && auth()->user()->id === $event->user_id)
                    <form action="{{ route('events.destroy', $event->id_evento) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="button" type="submit">Eliminar</button>
                    </form>
                    @endif
                </div>
            @endforeach
        @endif
    </div>
</div>

</body>
<script>
    // Ocultar mensajes después de 3 segundos (3000 milisegundos)
    setTimeout(() => {
        const successMsg = document.getElementById('successMessage');
        const errorMsg = document.getElementById('errorMessage');
        if (successMsg) successMsg.style.display = 'none';
        if (errorMsg) errorMsg.style.display = 'none';
    }, 3000); // Puedes cambiar este tiempo si quieres más/menos segundos
</script>
</html>

