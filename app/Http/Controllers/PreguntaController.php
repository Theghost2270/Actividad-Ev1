<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pregunta;
use App\Models\Evento;
use Illuminate\Support\Facades\Auth;

class PreguntaController extends Controller
{
    public function hacerPregunta(Request $request, $id_evento)
    {
        $request->validate(['pregunta' => 'required|string']);
        
        $evento = Evento::find($id_evento);
        if (!$evento) {
            return response()->json(['message' => 'Evento no encontrado'], 404);
        }
        
        $pregunta = Pregunta::create([
            'id_usuario' => Auth::id(),
            'id_evento' => $id_evento,
            'pregunta' => $request->pregunta
        ]);

        return response()->json(['message' => 'Pregunta enviada', 'pregunta' => $pregunta], 201);
    }

    public function verPreguntas($id_evento)
    {
        $evento = Evento::find($id_evento);
        if (!$evento) {
            return response()->json(['message' => 'Evento no encontrado'], 404);
        }

        $preguntas = Pregunta::where('id_evento', $id_evento)->get();
        return response()->json($preguntas, 200);
    }

    public function responderPregunta(Request $request, $id_pregunta)
    {
        $request->validate(['respuesta' => 'required|string']);
        
        $pregunta = Pregunta::find($id_pregunta);
        if (!$pregunta) {
            return response()->json(['message' => 'Pregunta no encontrada'], 404);
        }
        
        $evento = Evento::find($pregunta->id_evento);
        if ($evento->organizador !== Auth::id()) {
            return response()->json(['message' => 'No autorizado'], 403);
        }
        
        $pregunta->update(['respuesta' => $request->respuesta]);
        return response()->json(['message' => 'Respuesta agregada', 'pregunta' => $pregunta], 200);
    }
}
