<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocenteProyecto extends Model
{
    use HasFactory;

    protected $table = 'docente_proyectos';

    // Indicar clave primaria personalizada
    protected $primaryKey = 'docente_proyecto_id';

    // Si es auto incrementable
    public $incrementing = true;

    // Tipo de la clave primaria
    protected $keyType = 'int';

    public $timestamps = true;

    protected $fillable = [
        'docente_id',
        'proyecto_id',
    ];

    public function docente()
    {
        return $this->belongsTo(Docente::class, 'docente_id', 'docente_id');
    }

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'proyecto_id', 'id');
    }
}