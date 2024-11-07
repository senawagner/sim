<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fabricante extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'ativo'];

    public function equipamentos()
    {
        return $this->hasMany(Equipamento::class);
    }
}
