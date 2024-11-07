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

    protected $fillable = [
        'nome_usuario',
        'email',
        'perfil',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relacionamentos
    public function manutencoes()
    {
        return $this->hasMany(Manutencao::class);
    }

    // Métodos de verificação de perfil
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
