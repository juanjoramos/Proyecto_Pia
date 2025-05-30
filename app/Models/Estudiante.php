<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $primaryKey = 'estudiante_id';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $fillable = [
        'nombre',
        'correo',
        'codigo',
        'institucion_id',
    ];

    public function institucion()
    {
        return $this->belongsTo(Institucion::class, 'institucion_id', 'id');
    }
}