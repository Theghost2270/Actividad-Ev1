<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Evento</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1a1a1a;
            color: white;
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
        .event-details {
            padding: 10px;
        }
        .event-card {
            background-color: rgba(109, 64, 255, 0.778);
            padding: 15px;
            margin: 30px;
            border-radius: 10px;
        }
        .event-card h2 {
            margin: 0 0 10px;
            font-size: 16px;
        }
        .event-card p {
            margin: 5px 0;
            font-size: 14px;
        }
        .event-card strong {
            display: block;
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
    </style>
</head>
<body>
    <div class="header">
        <span>👤</span>
        <h1><a href="index.html"><img class="img_header" src="https://i.ibb.co/KjB2J0DH/Comm-3-removebg-preview.png" alt="Comm-removebg-preview" border="0"></a></h1>
        <div class="icons">
            <a href="event_creation.html"><img class="img_header1" src="https://cdn-icons-png.flaticon.com/128/1237/1237946.png" alt="Comm-removebg-preview" border="0"></a>
        </div>
    </div>
    
    <div class="event-details">
        <div class="event-card">
            <h2>Aplicar las 3R's en nuestra cotidianidad</h2>
            <p>Podrás aprender de manera práctica a Reducir, Reciclar y Reutilizar de formas que te beneficien y beneficien al planeta.</p>
            <p><strong>Organizador:</strong> Juan Soto</p>
            <p><strong>Costo:</strong> Gratuito</p>
            <p><strong>Categoría:</strong> Impacto ambiental</p>
            <p><strong>Edad mínima:</strong> Ninguna</p>
            <p><strong>Ubicación:</strong> Parque Clouthier</p>
            <div class="map"></div>
            <p><strong>Hora de inicio:</strong> 15:00 hrs</p>
            <p><strong>Hora de fin:</strong> 17:00 hrs</p>
            <p><strong>Contacto:</strong></p>
            <p>ejemplo@gmail.com</p>
            <p>+5212345678</p>
            <p>@ejemplo</p>
        </div>
    </div>
</body>
</html>
