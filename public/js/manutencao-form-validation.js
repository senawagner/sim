document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('manutencaoForm');
    
    form.addEventListener('submit', function(e) {
        let isValid = true;
        
        // Validar tipo
        const tipo = document.getElementById('tipo');
        if (!tipo.value) {
            isValid = false;
            tipo.classList.add('is-invalid');
        }
        
        // Validar periodicidade
        const periodicidade = document.getElementById('periodicidade');
        if (!periodicidade.value) {
            isValid = false;
            periodicidade.classList.add('is-invalid');
        }
        
        // Validar filial
        const filial = document.getElementById('filial_id');
        if (!filial.value) {
            isValid = false;
            filial.classList.add('is-invalid');
        }
        
        // Validar equipamento
        const equipamento = document.getElementById('equipamento_id');
        if (!equipamento.value) {
            isValid = false;
            equipamento.classList.add('is-invalid');
        }
        
        if (!isValid) {
            e.preventDefault();
        }
    });
});
