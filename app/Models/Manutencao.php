<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manutencao extends Model
{
    use HasFactory;

    protected $table = 'manutencoes';
    protected $primaryKey = 'manutencao_id';
    public $timestamps = true;

    const CREATED_AT = 'criado_em';
    const UPDATED_AT = 'atualizado_em';

    protected $fillable = [
        'tipo',
        'periodicidade',
        'itens_verificacao',
        'equipamento_id',
        'usuario_id',
        'filial_id',
        'data_manutencao',
        'observacoes',
    ];

    protected $dates = [
        'data_manutencao',
    ];

    // Relacionamentos
    public function equipamento()
    {
        return $this->belongsTo(Equipamento::class);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function filial()
    {
        return $this->belongsTo(Filial::class);
    }
}
