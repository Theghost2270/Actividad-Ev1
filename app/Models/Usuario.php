<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    public $timestamps = false;
    
    protected $fillable = [
        'nombre', 'correo', 'contrasenia', 'telefono', 'instagram'
    ];
    
    public function eventos()
    {
        return $this->hasMany(Evento::class, 'organizador');
    }
    
    public function asistencias()
    {
        return $this->hasMany(Asistencia::class, 'id_usuario');
    }
    
    public function preguntas()
    {
        return $this->hasMany(Pregunta::class, 'id_usuario');
    }
}

