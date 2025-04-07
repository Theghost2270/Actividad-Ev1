<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
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
    

    
    public function show($event_id)
    {
        $event = Event::findOrFail($event_id);
        //$event = Event::with('comments.user')->findOrFail($event_id);
        return view('event_details', compact('event'));
    }
    public function create()
    {
        //return view('events.create');
        return view('layouts.event_creation');    
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

        Event::create([
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

    public function destroy($id_evento)
    {
        $event =$event = Event::findOrFail($id_evento);

        // Verifica que el usuario sea el creador del evento
        if ($event->user_id === auth()->user()->id) {
            $event->delete();
            return redirect()->route('index')->with('success', 'Evento eliminado con éxito.');
        } else {
            return redirect()->route('index')->with('error', 'No tienes permiso para eliminar este evento.');
        }
    }

}
