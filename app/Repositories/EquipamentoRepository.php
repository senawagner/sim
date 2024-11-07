<?php

namespace App\Repositories;

use App\Models\Equipamento;
use App\Repositories\Interfaces\EquipamentoRepositoryInterface;

class EquipamentoRepository implements EquipamentoRepositoryInterface
{
    public function getAllPaginated($perPage = 10)
    {
        return Equipamento::with('filial')
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }

    public function create(array $data)
    {
        return Equipamento::create($data);
    }

    public function update(Equipamento $equipamento, array $data)
    {
        return $equipamento->update($data);
    }

    public function delete(Equipamento $equipamento)
    {
        return $equipamento->delete();
    }

    public function getByFilial($filialId)
    {
        return Equipamento::where('filial_id', $filialId)
            ->orderBy('numero_patrimonio')
            ->get();
    }
}
