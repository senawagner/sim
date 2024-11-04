<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Filial;
use App\Models\Equipamento;
use App\Models\Manutencao;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManutencaoControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_manutencao()
    {
        $filial = Filial::factory()->create();
        $equipamento = Equipamento::factory()->create(['filial_id' => $filial->id]);

        $data = [
            'tipo' => 'Preventiva',
            'periodicidade' => 'Mensal',
            'filial_id' => $filial->id,
            'equipamento_id' => $equipamento->equipamento_id,
            'data_programada' => '2023-05-01',
            'itens_verificacao' => 'Item 1, Item 2',
            'observacoes' => 'Observação teste',
        ];

        $response = $this->post(route('admin.manutencoes.store'), $data);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertDatabaseHas('manutencoes', [
            'tipo' => 'Preventiva',
            'equipamento_id' => $equipamento->equipamento_id,
        ]);
    }

    public function test_get_equipamentos_por_filial()
    {
        $filial = Filial::factory()->create();
        $equipamentos = Equipamento::factory()->count(3)->create(['filial_id' => $filial->id]);

        $response = $this->get(route('admin.equipamentos.por.filial', $filial->id));

        $response->assertStatus(200);
        $response->assertJsonCount(3);
        
        $equipamentos->each(function ($equipamento) use ($response) {
            $response->assertJsonFragment([$equipamento->equipamento_id => $equipamento->descricao_completa]);
        });
    }
}
