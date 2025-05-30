<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEntregable extends Model
{
    use HasFactory;

    protected $table = 'tipo_entregables';

    protected $primaryKey = 'tipo_entregable_id';

    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nombre',
        'descripcion',
    ];
}
