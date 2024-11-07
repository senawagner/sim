<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    use HasFactory;

    protected $fillable = ['codigo', 'fabricante_id', 'tipo', 'capacidade_id', 'ativo'];

    public function fabricante()
    {
        return $this->belongsTo(Fabricante::class);
    }

    public function capacidade()
    {
        return $this->belongsTo(Capacidade::class);
    }

    public function equipamentos()
    {
        return $this->hasMany(Equipamento::class);
    }

    // Scope para filtrar por tipo
    public function scopeEvaporadoras($query)
    {
        return $query->where('tipo', 'evaporadora');
    }

    public function scopeCondensadoras($query)
    {
        return $query->where('tipo', 'condensadora');
    }
}
