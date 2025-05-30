<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    use HasFactory;

    protected $table = 'evaluaciones';
    protected $fillable = ['criterio', 'calificacion', 'observaciones'];

    public function proyectos()
    {
        return $this->belongsToMany(Proyecto::class, 'proyecto_evaluaciones')
                    ->withPivot('evaluador_id', 'resultados_criterios')
                    ->withTimestamps();
    }

}