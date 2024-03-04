<?php

namespace App\Models;

use App\Mail\meuResetDeSenha;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'data_de_nascimento',
        'foto',
        'nome_da_mae',
        'nome_do_pai',
        'telefone',
        'rg',
        'cpf',
        'pis',
        'email',
        'password',
        'online',
        'sexo_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new meuResetDeSenha($token));
    }

    public function convites_enviados()
    {
        return $this->hasMany(Convite::class, 'usuario_id');
    }

    public function convites_recebidos()
    {
        return $this->hasMany(Convite::class);
    }

    public function enderecos()
    {
        return $this->hasMany(Endereco::class);
    }

    public function eventos()
    {
        return $this->hasMany(Evento::class);
    }

    public function pontos()
    {
        return $this->hasMany(Ponto::class);
    }

    public function transacoes()
    {
        return $this->hasMany(Transacao::class);
    }

    public function sexo()
    {
        return $this->belongsTo(Sexo::class);
    }
}
