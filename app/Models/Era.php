<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Era extends Model
{
    protected $primaryKey = 'era_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nombre',
        'descripcion',
        'evaluacion_id',
    ];

    public function evaluacion()
    {
        return $this->belongsTo(Evaluacion::class, 'evaluacion_id');
    }
}