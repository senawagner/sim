<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localizacao extends Model
{
    use HasFactory;

    protected $table = 'localizacao';
    
    protected $fillable = ['nome', 'ativo'];

    protected $casts = [
        'ativo' => 'boolean'
    ];

    public function equipamentos()
    {
        return $this->hasMany(Equipamento::class);
    }
}
