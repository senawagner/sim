<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Manutencao extends Model
{
    use HasFactory;

    protected $table = 'manutencoes';
    
    protected $fillable = [
        'tipo',
        'periodicidade',
        'equipamento_id',
        'usuario_id',
        'filial_id',
        'observacoes',
        'data_programada',
        'data_realizada',
        'status'
    ];

    protected $casts = [
        'data_programada' => 'date',
        'data_realizada' => 'date',
    ];

    // Relacionamentos
    public function equipamento()
    {
        return $this->belongsTo(Equipamento::class, 'equipamento_id');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function filial()
    {
        return $this->belongsTo(Filial::class, 'filial_id');
    }

    // Accessors formatados
    public function getFormattedDataProgramadaAttribute()
    {
        return $this->data_programada ? Carbon::parse($this->data_programada)->format('d/m/Y') : null;
    }

    public function getFormattedDataRealizadaAttribute()
    {
        return $this->data_realizada ? Carbon::parse($this->data_realizada)->format('d/m/Y') : null;
    }
}
