<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProyectoAsignatura extends Model
{
    use HasFactory;

    protected $table = 'proyecto_asignaturas';

    // Si la tabla tiene columna 'id' como PK, Laravel la usa por defecto
    // Si no, definir aquí: protected $primaryKey = 'id'; 

    protected $fillable = [
        'proyecto_id',
        'asignatura_id',
        'docente_id',
        'grupo',
    ];

    // Relaciones

    public function proyecto()
    {
        // 'proyecto_id' es FK local, 'id' es PK en proyectos
        return $this->belongsTo(Proyecto::class, 'proyecto_id', 'id');
    }

    public function asignatura()
    {
        // 'asignatura_id' es FK local, 'asignatura_id' es PK en asignaturas
        return $this->belongsTo(Asignatura::class, 'asignatura_id', 'asignatura_id');
    }

    public function docente()
    {
        // 'docente_id' es FK local, 'docente_id' es PK en docentes
        return $this->belongsTo(Docente::class, 'docente_id', 'docente_id');
    }
}
