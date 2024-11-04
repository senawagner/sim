<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Manutencao extends Model
{
    use HasFactory;

    protected $table = 'manutencoes';
    // Removido $primaryKey pois agora usamos 'id' como chave primária padrão
    public $timestamps = true;

    // Atualizados para usar os nomes padrão do Laravel
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'tipo',
        'periodicidade',
        // Removido 'itens_verificacao' pois não faz mais parte da tabela
        'equipamento_id',
        'usuario_id',
        'filial_id',
        'data_programada',
        'data_realizada',
        'observacoes',
        'status',
    ];

    protected $casts = [
        'data_programada' => 'date',
        'data_realizada' => 'date',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->status) {
                $model->status = 'Pendente'; // Atualizado para 'Pendente' com P maiúsculo
            }
        });
    }

    public function getFormattedDataProgramadaAttribute()
    {
        return $this->data_programada ? Carbon::parse($this->data_programada)->format('d/m/Y') : null;
    }

    public function getFormattedDataRealizadaAttribute()
    {
        return $this->data_realizada ? Carbon::parse($this->data_realizada)->format('d/m/Y') : null;
    }

    // Relacionamentos
    public function equipamento()
    {
        return $this->belongsTo(Equipamento::class, 'equipamento_id', 'equipamento_id');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function filial()
    {
        return $this->belongsTo(Filial::class, 'filial_id');
    }
}
