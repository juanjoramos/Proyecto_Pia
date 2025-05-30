<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    // Relaciones

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class);
    }

    public function evaluacion()
    {
        return $this->belongsTo(Evaluacion::class);
    }

    public function evaluador()
    {
        return $this->belongsTo(Evaluador::class);
    }
}