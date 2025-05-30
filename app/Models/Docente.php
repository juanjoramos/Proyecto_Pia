<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $primaryKey = 'docente_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nombres',
        'documento',
        'correo',
        'telefono',
        'departamento_id'
    ];

public function departamento()
{
    return $this->belongsTo(Departamento::class, 'departamento_id', 'departamento_id');
}
}