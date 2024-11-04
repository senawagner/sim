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
        'tipo' => 'string',
        'criado_em' => 'datetime',
        'atualizado_em' => 'datetime'
    ];

    // Adicionar constantes para os tipos permitidos
    const TIPO_SPLIT = 'Split';
    const TIPO_ACJ = 'ACJ';

    // Adicionar constantes para as características permitidas
    const CARACTERISTICAS = [
        'High Wall',
        'Piso Teto',
        'Inverter',
        'Frio',
        'Frio/Quente',
        '110.Mono',
        '220/Mono',
        '220/Trifasico',
        '380/Trifasico'
    ];

    // Relacionamentos
    public function filial()
    {
        return $this->belongsTo(Filial::class);
    }

    public function manutencoes()
    {
        return $this->hasMany(Manutencao::class, 'equipamento_id', 'equipamento_id');
    }

    // Métodos
    public function getDescricaoCompletaAttribute()
    {
        return "{$this->tipo} - {$this->fabricante} - {$this->numero_patrimonio} ({$this->localizacao})";
    }

    // Escopos
    public function scopePorFilial($query, $filialId)
    {
        return $query->where('filial_id', $filialId);
    }
}
