<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluador extends Model
{
    use HasFactory;

    protected $table = 'evaluadores';

    protected $primaryKey = 'evaluador_id';

    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nombres',
        'apellidos',
        'correo',
        'telefono',
        'departamento_id',
    ];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'departamento_id');
    }
}