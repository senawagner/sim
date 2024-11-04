document.addEventListener('DOMContentLoaded', function() {
    const filialSelect = document.getElementById('filial_id');
    const equipamentoSelect = document.getElementById('equipamento_id');

    filialSelect.addEventListener('change', function() {
        const filialId = this.value;
        if (filialId) {
            fetch(`/admin/equipamentos-por-filial/${filialId}`)
                .then(response => response.json())
                .then(data => {
                    equipamentoSelect.innerHTML = '<option value="">Selecione o equipamento</option>';
                    data.forEach(equipamento => {
                        equipamentoSelect.innerHTML += `<option value="${equipamento.id}">${equipamento.nome}</option>`;
                    });
                    equipamentoSelect.disabled = false;
                })
                .catch(error => console.error('Erro ao carregar equipamentos:', error));
        } else {
            equipamentoSelect.innerHTML = '<option value="">Selecione o equipamento</option>';
            equipamentoSelect.disabled = true;
        }
    });
});
