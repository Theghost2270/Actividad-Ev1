<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tematica extends Model
{
    use HasFactory;
    
    protected $table = 'tematicas';
    protected $primaryKey = 'id_tematica';
    public $timestamps = false;
    
    protected $fillable = ['nombre'];
    
    public function eventos()
    {
        return $this->hasMany(Evento::class, 'tematica');
    }
}
