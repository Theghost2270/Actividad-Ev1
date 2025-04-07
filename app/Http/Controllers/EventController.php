<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;


class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('layouts.index', compact('events'));
        $events = Evento::all();
        return view('events.index', compact('events'));
        $events = Event::all();
        return view('layouts.index', compact('events'));
        $eventos = Event::all(); // Cargar todos los eventos
        return view('index', compact('eventos')); // Pasarlos a la vista
    }
    
    public function show($id)
    {
        $event = Event::findOrFail($id);
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
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'costo' => 'nullable|numeric',
            'edad_minima' => 'nullable|integer',
            'categoria' => 'required|string',
            'usuario' => 'nullable|string',
        ]);

        Event::create($request->all());

        return redirect()->route('events.index')->with('success', 'Evento creado con éxito');
    }
}
