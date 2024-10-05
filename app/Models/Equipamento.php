<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    use HasFactory;

    protected $table = 'equipamentos';
    protected $primaryKey = 'equipamento_id';
    public $timestamps = true;

    const CREATED_AT = 'criado_em';
    const UPDATED_AT = 'atualizado_em';

    protected $fillable = [
        'fabricante',
        'tipo',
        'capacidade',
        'numero_patrimonio',
        'modelo_evaporadora',
        'modelo_condensadora',
        'caracteristicas',
        'filial_id',
        'localizacao',
        'andar',
        'observacoes',
    ];

    protected $casts = [
        'caracteristicas' => 'array',
    ];

    // Relacionamentos
    public function filial()
    {
        return $this->belongsTo(Filial::class);
    }

    public function manutencoes()
    {
        return $this->hasMany(Manutencao::class);
    }
}
