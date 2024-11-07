<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\EquipamentoRepository;
use App\Repositories\Interfaces\EquipamentoRepositoryInterface;

class EquipamentoServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(EquipamentoRepositoryInterface::class, EquipamentoRepository::class);
    }
}
