<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    use HasFactory;

    protected $table = 'equipamentos';

    protected $fillable = [
        'numero_patrimonio',
        'tipo',
        'fabricante_id',
        'capacidade_id',
        'modelo_evaporadora_id',
        'modelo_condensadora_id',
        'filial_id',
        'localizacao_id',
        'setor_id',
        'observacoes'
    ];

    // Relacionamentos
    public function fabricante()
    {
        return $this->belongsTo(Fabricante::class);
    }

    public function capacidade()
    {
        return $this->belongsTo(Capacidade::class);
    }

    public function modeloEvaporadora()
    {
        return $this->belongsTo(Modelo::class, 'modelo_evaporadora_id');
    }

    public function modeloCondensadora()
    {
        return $this->belongsTo(Modelo::class, 'modelo_condensadora_id');
    }

    public function filial()
    {
        return $this->belongsTo(Filial::class);
    }

    public function localizacao()
    {
        return $this->belongsTo(Localizacao::class, 'localizacao_id');
    }

    public function setor()
    {
        return $this->belongsTo(Setor::class, 'setor_id');
    }

    // Acessors
    public function getLocalizacaoCompletaAttribute()
    {
        return "{$this->localizacao->nome} - {$this->setor->nome}";
    }

    public function getCapacidadeFormatadaAttribute()
    {
        return "{$this->capacidade->valor} BTUs";
    }
}
