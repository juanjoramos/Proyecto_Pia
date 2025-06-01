<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    use HasFactory;

    protected $table = 'programas';
    protected $primaryKey = 'programa_id';

    protected $keyType = 'int';
    public $incrementing = true;

    protected $fillable = [
        'nombre',
        'codigo',
        'facultad_id',
    ];

    // Relación con Facultad (actualizado)
    public function facultad()
    {
        return $this->belongsTo(Facultad::class, 'facultad_id');
    }
}