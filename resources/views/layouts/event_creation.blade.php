<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Evento</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1a1a1a;
            color:black;
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
            background-color: #8a2be2;
            color: rgb(0, 0, 0);
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #6a0dad;
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
        <h1><a href="{{ route('index') }}"><img class="img_header" src="https://i.ibb.co/KjB2J0DH/Comm-3-removebg-preview.png" alt="Community App"></a></h1>
        <div class="icons">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button style="background: none; border: none; color: white; cursor: pointer;">🚪 Cerrar sesión</button>
            </form>
        </div>
    </div>

    <div class="container mx-auto px-4 py-8">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Crear Evento
        </h2>
    </x-slot>
        <form action="{{ route('events.store') }}" method="POST">
            @csrf
            <input type="text" name="titulo" placeholder="Nombre del evento" required class="block w-full border-gray-300">
            <textarea name="descripcion" placeholder="Descripción" class="block w-full border-gray-300"></textarea>
            <input type="number" name="costo" placeholder="Costo" class="block w-full border-gray-300">
            <input type="number" name="edad_minima" placeholder="Edad mínima" class="block w-full border-gray-300">
            <select name="categoria" required class="block w-full border-gray-300">
                <option value="">Selecciona la categoría</option>
                <option value="Impacto ambiental">Impacto ambiental</option>
                <option value="Educación">Educación</option>
                <option value="Cultura">Cultura</option>
                <option value="Recreación">Recreación</option>
            </select>
            <input type="text" name="usuario" placeholder="Usuario (opcional)" class="block w-full border-gray-300">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Añadir evento</button>
        </form>
    </div>
</body>
</html>