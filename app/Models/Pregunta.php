<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;
    
    protected $table = 'preguntas';
    protected $primaryKey = 'id_pregunta';
    public $timestamps = false;
    
    protected $fillable = ['id_usuario', 'id_evento', 'pregunta', 'respuesta'];
    
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
    
    public function evento()
    {
        return $this->belongsTo(Evento::class, 'id_evento');
    }
}