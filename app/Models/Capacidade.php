<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capacidade extends Model
{
    use HasFactory;

    protected $fillable = ['valor', 'ativo'];

    public function equipamentos()
    {
        return $this->hasMany(Equipamento::class);
    }
}
