document.addEventListener('DOMContentLoaded', function() {
    const filialSelect = document.getElementById('filial_id');
    const equipamentoSelect = document.getElementById('equipamento_id');

    if (!filialSelect || !equipamentoSelect) {
        console.error('Elementos do formulário não encontrados');
        return;
    }

    filialSelect.addEventListener('change', async function() {
        const filialId = this.value;
        
        if (!filialId) {
            equipamentoSelect.innerHTML = '<option value="">Selecione primeiro a filial</option>';
            return;
        }

        try {
            equipamentoSelect.innerHTML = '<option value="">Carregando...</option>';
            
            const url = `/administrador/equipamentos-por-filial/${filialId}`;
            console.log('Fazendo requisição para:', url);
            
            const response = await fetch(url, {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
            
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            
            const data = await response.json();
            console.log('Dados recebidos:', data);

            equipamentoSelect.innerHTML = '<option value="">Selecione o equipamento</option>';
            
            if (data && typeof data === 'object' && Object.keys(data).length > 0) {
                Object.entries(data).forEach(([id, descricao]) => {
                    console.log('Adicionando equipamento:', { id, descricao });
                    const option = new Option(descricao, id);
                    equipamentoSelect.add(option);
                });
            } else {
                equipamentoSelect.innerHTML = '<option value="">Nenhum equipamento encontrado</option>';
            }

        } catch (error) {
            console.error('Erro ao buscar equipamentos:', error);
            equipamentoSelect.innerHTML = '<option value="">Erro ao carregar equipamentos</option>';
            
            if (error.response) {
                console.error('Detalhes da resposta:', await error.response.text());
            }
        }
    });
});
