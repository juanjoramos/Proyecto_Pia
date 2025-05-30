<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstudianteProyecto extends Model
{
    use HasFactory;

    protected $table = 'estudiante_proyectos';

    // Indicar clave primaria personalizada
    protected $primaryKey = 'estudiante_proyecto_id';

    // Si es auto incrementable
    public $incrementing = true;

    // Tipo de la clave primaria
    protected $keyType = 'int';

    public $timestamps = true;

    protected $fillable = [
        'estudiante_id',
        'proyecto_id',
    ];

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'estudiante_id', 'estudiante_id');
    }

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'proyecto_id', 'id');
    }
}
