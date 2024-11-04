<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Usuario extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $guard_name = 'web';

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

    public function getAuthPassword()
    {
        return $this->senha;
    }

    public function getRememberTokenName()
    {
        return 'token_lembrete';
    }

    public function getAuthIdentifierName()
    {
        return 'nome_usuario';
    }

    public function getAuthIdentifier()
    {
        return $this->nome_usuario;
    }

    public function getPasswordAttribute()
    {
        return $this->senha;
    }

    /**
     * Verifica se o usuário é um administrador.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->perfil === 'administrador';
    }

    public function isArquiteto()
    {
        return $this->perfil === 'arquiteto';
    }

    public function isAdministrador()
    {
        return $this->perfil === 'administrador';
    }

    public function isCoordenador()
    {
        return $this->perfil === 'coordenador';
    }

    public function isTecnico()
    {
        return $this->perfil === 'tecnico';
    }
}
