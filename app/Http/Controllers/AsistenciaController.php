<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asistencia;
use App\Models\Evento;
use Illuminate\Support\Facades\Auth;

class AsistenciaController extends Controller
{
    public function asistir($id_evento)
    {
        $evento = Evento::find($id_evento);
        if (!$evento) {
            return response()->json(['message' => 'Evento no encontrado'], 404);
        }

        $asistencia = Asistencia::create([
            'id_usuario' => Auth::id(),
            'id_evento' => $id_evento
        ]);

        return response()->json(['message' => 'Asistencia confirmada', 'asistencia' => $asistencia], 201);
    }

    public function cancelarAsistencia($id_evento)
    {
        $asistencia = Asistencia::where('id_usuario', Auth::id())
            ->where('id_evento', $id_evento)
            ->first();

        if (!$asistencia) {
            return response()->json(['message' => 'No estás registrado en este evento'], 404);
        }

        $asistencia->delete();
        return response()->json(['message' => 'Asistencia cancelada'], 200);
    }

    public function asistentes($id_evento)
    {
        $evento = Evento::find($id_evento);
        if (!$evento) {
            return response()->json(['message' => 'Evento no encontrado'], 404);
        }

        $asistentes = Asistencia::where('id_evento', $id_evento)->with('usuario')->get();
        return response()->json($asistentes, 200);
    }
}