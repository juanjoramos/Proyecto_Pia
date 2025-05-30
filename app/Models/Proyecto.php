<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model {
    use HasFactory;

    protected $fillable = [
        'titulo',
        'resumen',
        'fecha_inicio',
        'fecha_fin',
        'estado',
        'id_tipo_proyecto'
    ];

    public function tipoProyecto() {
        return $this->belongsTo(TipoProyecto::class, 'id_tipo_proyecto');
    }

    public function asignaturasAsignadas()
    {
        return $this->hasMany(ProyectoAsignatura::class, 'proyecto_id');
    }

    public function evaluaciones()
    {
        return $this->belongsToMany(Evaluacion::class, 'proyecto_evaluaciones')
                    ->withPivot('evaluador_id', 'resultados_criterios')
                    ->withTimestamps();
    }

    protected $casts = [
        'fecha_inicio' => 'datetime',
        'fecha_fin' => 'datetime',
    ];
}
