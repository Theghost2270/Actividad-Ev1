<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comentario;
use App\Models\Event;

class ComentarioController extends Controller
{
    public function store(Request $request, $id_evento)
    {
        $request->validate([
            'contenido' => 'required|string|max:1000',
        ]);

        $comentario = Comentario::create([
            'user_id' => auth()->id(),
            'id_evento' => $id_evento,
            'contenido' => $request->contenido,
        ]);

        return redirect()->route('events.show', $id_evento)->with('success', 'Comentario agregado exitosamente.');
    }

    public function index($id_evento)
    {
        $comentarios = Comentario::with('usuario')->where('id_evento', $id_evento)->latest()->get();
        return response()->json($comentarios);
    }

    public function destroy($id)
    {
        // Buscar el comentario
        $comentario = Comentario::findOrFail($id);

        // Verifica si el comentario pertenece al usuario autenticado
        if ($comentario->user_id === auth()->user()->id) {
            $comentario->delete(); // Eliminar el comentario
            return redirect()->back()->with('success', 'Comentario eliminado con éxito.');
        }

        // Si no es el dueño del comentario, redirige con un mensaje de error
        return redirect()->back()->with('error', 'No tienes permiso para eliminar este comentario.');
    }

}
