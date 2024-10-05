<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    public $timestamps = true;

    const CREATED_AT = 'criado_em';
    const UPDATED_AT = 'atualizado_em';

    protected $fillable = [
        'nome',
        'email',
        'perfil',
        'senha',
        'nome_usuario',
    ];

    protected $hidden = [
        'senha',
        'token_lembrete',
    ];

    protected $dates = [
        'email_verificado_em',
    ];

    // Relacionamentos
    public function manutencoes()
    {
        return $this->hasMany(Manutencao::class);
    }
}
