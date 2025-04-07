<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Evento</title>
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
            background-color:rgba(21, 25, 29, 0.74);
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
            padding: 20px;
            margin: 30px;
        }
        input, textarea, select, button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: none;
        }
        input, textarea, select {
            background-color: #333;
            color: white;
        }
        button {
            background-color:
            color: rgba(255, 255, 255, 0.55);
            font-size: 16px;
            cursor: pointer;
        }
        .text {
            color : white;
        }
        button:hover {
            background-color:rgb(152, 176, 199);
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

    <div class="container mx-auto px-4 py-8" >
        
        <form action="{{ route('events.store') }}" method="POST">
        @csrf
        <label class="text" for="titulo">Título</label>
        <input type="text" name="titulo" id="titulo" placeholder="Título del evento" required>

        <label class="text" for="descripcion">Descripción</label>
        <input type="text" name="descripcion" id="descripcion" placeholder="Descripción del evento">
        
        <label class="text" for="organizador">Organizador</label>
        <input type="text" name="organizador" id="organizador" placeholder="Organizador">
    
        <label class="text" for="costo">Costo</label>
        <input type="text" name="costo" id="costo" placeholder="Costo del evento">

        <label class="text" for="edad_minima">Edad mínima</label>
        <input type="number" name="edad_minima" id="edad_minima" placeholder="Edad mínima para asistir">

        <label class="text" for="tematica">Temática</label>
        <select name="tematica" id="tematica" required>
            <option value="">Selecciona la Tematica</option>
            <option value="Impacto ambiental">Impacto ambiental</option>
            <option value="Educación">Educación</option>
            <option value="Cultura">Cultura</option>
            <option value="Recreación">Recreación</option>
        </select>
        
        <label class="text" for="fecha">Fecha</label>
        <input type="date" name="fecha" id="fecha">
    
        <label class="text" for="hora">Hora</label>
        <input type="time" name="hora" id="hora">

        <label class="text" for="ubicacion">Ubicación</label>
        <input type="text" name="ubicacion" id="ubicacion" placeholder="Ubicación del evento">
    
        <input type="hidden" name="contacto" value="Email: {{ auth()->user()->email }}, Teléfono: {{ auth()->user()->phone }}">
        
        <button type="submit">Añadir evento</button>
        </form>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
</body>
</html>