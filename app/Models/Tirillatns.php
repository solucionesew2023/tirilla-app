<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tirillatns extends Model
{
    use HasFactory;

    protected $fillable = [
        'mes',
        'ano',
        'detalleid',
        'personalid',
        'codigo',
        'nombre',
        'nomconcepto',
        'conceptoid',
        'tipodc',
        'cantidad',
        'valor',
        'saldo',
        'tex_adic',
        'novedadid',
        'nombanco',
        'ctatrab'
    ];
}
