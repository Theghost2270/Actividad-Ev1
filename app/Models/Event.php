<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;
    
    protected $table = 'events';
    protected $primaryKey = 'id';
    public $timestamps = false;
    
    protected $fillable = [
        'id_evento', 'titulo', 'descripcion', 'organizador', 'costo', 'edad_minima', 'tematica', 'fecha', 'hora', 'ubicacion', 'contacto', 'user_id'
    ];
    
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    //public function comments(){   return $this->hasMany(Comment::class, 'event_id'); // Asegúrate de que el campo 'event_id' exista en la tabla 'comments' }
    
    public function organizador()
    {
        return $this->belongsTo(Usuario::class, 'organizador');
    }
    
    public function tematica()
    {
        return $this->belongsTo(Tematica::class, 'tematica');
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'id_evento', 'id_evento');
    }

}
