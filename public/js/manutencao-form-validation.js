document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('#manutencaoForm');
    if (form) {
        form.addEventListener('submit', function(event) {
            if (!validateForm()) {
                event.preventDefault();
            }
        });
    }

    function validateForm() {
        let isValid = true;

        // Validar tipo
        const tipo = document.querySelector('#tipo');
        if (!tipo.value) {
            showError(tipo, 'O tipo de manutenção é obrigatório.');
            isValid = false;
        } else {
            clearError(tipo);
        }

        // Validar periodicidade
        const periodicidade = document.querySelector('#periodicidade');
        if (!periodicidade.value) {
            showError(periodicidade, 'A periodicidade é obrigatória.');
            isValid = false;
        } else {
            clearError(periodicidade);
        }

        // Validar filial
        const filial = document.querySelector('#filial_id');
        if (!filial.value) {
            showError(filial, 'A filial é obrigatória.');
            isValid = false;
        } else {
            clearError(filial);
        }

        // Validar equipamento
        const equipamento = document.querySelector('#equipamento_id');
        if (!equipamento.value) {
            showError(equipamento, 'O equipamento é obrigatório.');
            isValid = false;
        } else {
            clearError(equipamento);
        }

        // Validar data programada
        const dataProgramada = document.querySelector('#data_programada');
        if (!dataProgramada.value) {
            showError(dataProgramada, 'A data programada é obrigatória.');
            isValid = false;
        } else {
            clearError(dataProgramada);
        }

        // Validar itens de verificação
        const itensVerificacao = document.querySelector('#itens_verificacao');
        if (!itensVerificacao.value.trim()) {
            showError(itensVerificacao, 'Os itens de verificação são obrigatórios.');
            isValid = false;
        } else {
            clearError(itensVerificacao);
        }

        return isValid;
    }

    function showError(input, message) {
        const formGroup = input.closest('.form-group');
        const errorElement = formGroup.querySelector('.invalid-feedback') || document.createElement('div');
        errorElement.className = 'invalid-feedback';
        errorElement.textContent = message;
        formGroup.appendChild(errorElement);
        input.classList.add('is-invalid');
    }

    function clearError(input) {
        const formGroup = input.closest('.form-group');
        const errorElement = formGroup.querySelector('.invalid-feedback');
        if (errorElement) {
            errorElement.remove();
        }
        input.classList.remove('is-invalid');
    }
});
