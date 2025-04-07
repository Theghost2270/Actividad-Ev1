<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;
    
    protected $table = 'events';
    protected $primaryKey = 'id_evento';
    public $timestamps = false;
    
    protected $fillable = [
        'titulo', 'descripcion', 'organizador', 'costo', 'edad_minima', 'tematica', 'fecha', 'hora', 'ubicacion', 'contacto'
    ];
    
    public function organizador()
    {
        return $this->belongsTo(Usuario::class, 'organizador');
    }
    
    public function tematica()
    {
        return $this->belongsTo(Tematica::class, 'tematica');
    }
    
    public function asistentes()
    {
        return $this->hasMany(Asistencia::class, 'id_evento');
    }
    
    public function preguntas()
    {
        return $this->hasMany(Pregunta::class, 'id_evento');
    }
}
