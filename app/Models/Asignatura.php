<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    use HasFactory;

    protected $table = 'asignaturas';

    protected $primaryKey = 'asignatura_id';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'codigo',
        'creditos',
        'programa_id',
    ];

    public function programa()
    {
        return $this->belongsTo(Programa::class, 'programa_id', 'programa_id');
    }

    public function proyectos()
    {
        return $this->belongsToMany(
            Proyecto::class,            // Modelo relacionado
            'proyecto_asignaturas',    // Tabla pivote
            'asignatura_id',           // Foreign key en pivote que apunta a Asignatura
            'proyecto_id'              // Foreign key en pivote que apunta a Proyecto
        )
        ->withPivot('grupo', 'docente_id')
        ->withTimestamps();
    }

    public function getRouteKeyName()
    {
        return 'asignatura_id';
    }
}