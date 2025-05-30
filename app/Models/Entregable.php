<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entregable extends Model
{
    protected $table = 'entregables';
    protected $primaryKey = 'entregable_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nombre',
        'descripcion',
        'fecha_entrega',
        'proyecto_id',
        'tipo_entregable_id',
    ];

    // Indica que fecha_entrega es un campo de fecha para usar métodos Carbon
    protected $casts = [
        'fecha_entrega' => 'date',
    ];

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'proyecto_id');
    }

    public function tipoEntregable()
    {
        return $this->belongsTo(TipoEntregable::class, 'tipo_entregable_id');
    }
}
