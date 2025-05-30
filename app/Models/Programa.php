<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    use HasFactory;

    protected $table = 'programas';
    protected $primaryKey = 'programa_id';

    // Definimos el tipo de clave primaria y si es autoincremental
    protected $keyType = 'int';
    public $incrementing = true;

    protected $fillable = [
        'nombre',
        'codigo',
        'departamento_id',
    ];

    // Relación con Departamento
    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'departamento_id');
    }
}
