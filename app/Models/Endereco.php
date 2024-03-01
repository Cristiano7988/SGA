<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_usuario',
        'logradouro',
        'numero',
        'complemento',
        'cep',
        'bairro',
        'cidade',
        'estado',
        'pais',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
