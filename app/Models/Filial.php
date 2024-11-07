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

    protected $fillable = [
        'nome',
        'endereco',
        'cidade',
        'estado',
        'cep',
        'telefone',
        'data_preferencial'
    ];

    protected $dates = [
        'data_preferencial',
        'created_at',
        'updated_at'
    ];

    // Relacionamentos
    public function equipamentos()
    {
        return $this->hasMany(Equipamento::class);
    }

    public function manutencoes()
    {
        return $this->hasMany(Manutencao::class);
    }
}
