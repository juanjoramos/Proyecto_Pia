<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ira extends Model
{
    protected $primaryKey = 'ira_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'valor',
        'observaciones',
        'estudiante_id',
        'era_id',
    ];

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'estudiante_id');
    }

    public function era()
    {
        return $this->belongsTo(Era::class, 'era_id');
    }
}