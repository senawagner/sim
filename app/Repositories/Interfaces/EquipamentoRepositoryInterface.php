<?php

namespace App\Repositories\Interfaces;

use App\Models\Equipamento;

interface EquipamentoRepositoryInterface
{
    public function getAllPaginated($perPage = 10);
    public function create(array $data);
    public function update(Equipamento $equipamento, array $data);
    public function delete(Equipamento $equipamento);
    public function getByFilial($filialId);
}
