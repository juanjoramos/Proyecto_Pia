<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; // Esta es la línea que debe estar presente
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProyectoEvaluacion extends Model
{
    use HasFactory;

        protected $table = 'proyecto_evaluaciones';

    protected $fillable = [
        'proyecto_id',
        'evaluacion_id',
        'evaluador_id',
        'resultados_criterios',
    ];

public function proyecto()
{
    return $this->belongsTo(Proyecto::class, 'proyecto_id');
}


public function evaluacion()
{
    return $this->belongsTo(Evaluacion::class, 'evaluacion_id');
}

    public function evaluador()
    {
        return $this->belongsTo(Evaluador::class, 'evaluador_id');
    }
}
