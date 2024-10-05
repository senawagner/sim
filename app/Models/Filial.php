<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filial extends Model
{
    use HasFactory;

    protected $table = 'filiais';
    protected $primaryKey = 'id';
    public $timestamps = true;

    const CREATED_AT = 'criado_em';
    const UPDATED_AT = 'atualizado_em';

    protected $fillable = [
        'nome',
        'endereco',
        'cidade',
        'estado',
        'cnpj',
        'observacoes',
        'dt_padrao',
    ];

    protected $dates = [
        'dt_padrao',
    ];

    // Relacionamentos
    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function equipamentos()
    {
        return $this->hasMany(Equipamento::class);
    }

    public function manutencoes()
    {
        return $this->hasMany(Manutencao::class);
    }
}
