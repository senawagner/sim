<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    use HasFactory;

    protected $table = 'setor';
    
    protected $fillable = ['nome', 'ativo'];

    protected $casts = [
        'ativo' => 'boolean'
    ];

    public function equipamentos()
    {
        return $this->hasMany(Equipamento::class);
    }
}
