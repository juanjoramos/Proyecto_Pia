<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoProyecto extends Model {
    use HasFactory;

    protected $table = 'tipo_proyectos'; // Asegura que use el nombre correcto de la tabla

    protected $primaryKey = 'id'; // No es necesario si usas la convención, pero explícito es más claro

    protected $fillable = ['codigo', 'descripcion'];

    /**
     * Relación: Un TipoProyecto tiene muchos Proyectos
     */
    public function proyectos()
    {
        return $this->hasMany(Proyecto::class, 'id_tipo_proyecto');
    }
}
