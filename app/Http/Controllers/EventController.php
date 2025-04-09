<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Comentario;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    

    public function index(Request $request)
    {
        $query = Event::query();
        // Filtro por temática
        if ($request->has('tematica') && $request->tematica != '') {
            $query->where('tematica', $request->tematica);
        }
        // Búsqueda por nombre o descripción
        if ($request->has('search') && $request->search != '') {
            $query->where(function ($q) use ($request) {
                $q->where('titulo', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }
        $events = $query->get(); // Todos los eventos filtrados
        $tematicas = Event::select('tematica')->distinct()->get(); // Lista para el select de filtros
        // Aquí eliges tu vista real
        return view('layouts.index', compact('events', 'tematicas'));
    }
    
    public function show($id_evento)
    {
        $event = Event::where('id_evento', $id_evento)->firstOrFail();
        $comentarios = $event->comentarios()->with('usuario')->latest()->get();
        return view('eventos.event_details', compact('event', 'comentarios'));
    }

    public function create()
    {
        return view('eventos.event_creation');    
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'organizador' => 'nullable|string',
            'costo' => 'nullable|numeric',
            'edad_minima' => 'nullable|integer',
            'tematica' => 'required|string',
            'fecha' => 'nullable|date',
            'hora' => 'nullable',
            'ubicacion' => 'nullable|string',
        ]);

        $id_evento = uniqid('event_', true);

        Event::create([
            'id_evento' => $id_evento,
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'organizador' => $request->organizador,
            'costo' => $request->costo,
            'edad_minima' => $request->edad_minima,
            'tematica' => $request->tematica,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'ubicacion' => $request->ubicacion,
            'contacto' => 'Email: ' . auth()->user()->email . ', Teléfono: ' . auth()->user()->phone,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('events.index')->with('success', 'Evento creado con éxito');
    }

    public function storeComment(Request $request, $id_evento)
    {
        $request->validate([
            'contenido' => 'required|string|max:500',
            'event_id' => 'required|exists:events,id_evento', // Asegúrate de validar el evento
        ]);

        $comentario = new Comentario();
        $comentario->contenido = $request->contenido;
        $comentario->event_id = $request->event_id;
        $comentario->user_id = auth()->user()->id;
        $comentario->save();

        return redirect()->route('events.show', $id_evento)->with('success', 'Comentario agregado exitosamente');
    }


    public function destroy($id_evento)
{
    $event = Event::where('id_evento', $id_evento)->firstOrFail();

    if ($event->user_id === auth()->user()->id) {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Evento eliminado con éxito.');
    } else {
        return redirect()->route('events.index')->with('error', 'No tienes permiso para eliminar este evento.');
    }
}


}
