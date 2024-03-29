<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'horario_inicial',
        'horario_final',
        'dia_id',
        'endereco_id',
        'tipo_de_evento_id',
        'empresa_id',
        'usuario_id'
    ];

    public function convidados()
    {
        return $this->hasMany(Convite::class);
    }

    public function dia()
    {
        return $this->belongsTo(Dia::class);
    }

    public function endereco()
    {
        return $this->belongsTo(Endereco::class);
    }

    public function pontos()
    {
        return $this->hasMany(Ponto::class);
    }

    public function transacoes()
    {
        return $this->hasMany(Transacao::class);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
