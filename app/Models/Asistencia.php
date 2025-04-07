<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;
    
    protected $table = 'asistencias';
    protected $primaryKey = 'id_asistencia';
    public $timestamps = false;
    
    protected $fillable = ['id_usuario', 'id_evento'];
    
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
    
    public function evento()
    {
        return $this->belongsTo(Evento::class, 'id_evento');
    }
}

