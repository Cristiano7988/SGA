<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ponto extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'hora',
        'latitude',
        'longitude',
        'foto',
        'ip',
        'nsr',
        'usuario_id',
        'evento_id',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }
}
