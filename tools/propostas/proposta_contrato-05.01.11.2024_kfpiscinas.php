<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contrato de Prestação de Serviços Digitais</title>
    <style>
        /* CSS Styles */
        :root {
            --primary-color: #1e1e1e;     /* Azul escuro profissional */
            --secondary-color: #34495e;   /* Azul médio */
            --accent-color: #3498db;      /* Azul claro para destaque */
            --text-primary: #2c3e50;      /* Cor principal do texto */
            --text-secondary: #7f8c8d;    /* Cor secundária do texto */
            --background-primary: #ffffff; /* Fundo principal */
            --background-secondary: #f9f9f9; /* Fundo secundário */
            --border-color: #e0e0e0;      /* Cor das bordas */
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
            background-color: var(--background-primary);
            color: var(--text-primary);
            line-height: 1.6;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            box-sizing: border-box;
        }

        .header, .footer {
            background-color: var(--primary-color);
            color: white;
            padding: 40px 30px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 20px;
        }

        .logo-container img {
            width: 180px;
            height: auto;
            display: block;
        }

        .header h1 {
            color: white;
            font-size: 2.5em;
            margin: 0;
            font-weight: 300;
            letter-spacing: 1px;
        }

        .header-subtitle {
            color: var(--accent-color);
            font-size: 1.1em;
            margin: 0.5rem 0 0;
            font-weight: 300;
            letter-spacing: 1px;
        }

        .section {
            padding: 30px;
            margin-bottom: 30px;
            background-color: var(--background-secondary);
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            border: 1px solid var(--border-color);
        }

        .section h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: var(--primary-color);
            border-bottom: 2px solid var(--accent-color);
            padding-bottom: 10px;
            font-weight: 500;
        }

        .section p, .section ul li {
            font-size: 16px;
            line-height: 1.8;
            color: var(--text-primary);
        }

        .acceptance-section {
            margin-top: 40px;
        }

        .acceptance-form {
            max-width: 500px;
            margin: 0 auto;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .form-input {
            padding: 12px;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            font-size: 16px;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .accept-button {
            background-color: var(--accent-color);
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .accept-button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header Section -->
        <div class="header">
            <div class="header-content">
                <div class="logo-container">
                    <img src="https://coddar.com.br/assets/logo-coddar-black.png" alt="Logo Coddar">
                </div>
                <h1>Contrato de Prestação de Serviços Digitais</h1>
                <p class="header-subtitle">Desenvolvimento Web & Marketing Digital</p>
            </div>
        </div>

        <!-- 1. Partes Contratantes Section -->
        <div class="section">
            <h2>1. Partes Contratantes</h2>
            <p>
                Este contrato é celebrado entre Coddar Digital, uma empresa de tecnologia com sede em Santos, 
                doravante denominada "Contratada", e Freddy (KF Piscinas), também com sede em Santos, 
                doravante denominado "Contratante".
            </p>
        </div>

        <!-- 2. Objeto do Contrato Section -->
        <div class="section">
            <h2>2. Objeto do Contrato</h2>
            <p>
                O presente contrato tem como objeto a prestação de serviços digitais pela Contratada ao Contratante, 
                conforme descrito na seção "Definição do Projeto".
            </p>
        </div>

        <!-- 3. Definição do Projeto Section -->
        <div class="section">
            <h2>3. Definição do Projeto</h2>
            <p>A Contratada se compromete a fornecer os seguintes serviços ao Contratante:</p>
            <ul>
                <li>Criação de Landing Page otimizada para dispositivos móveis</li>
                <li>Criação e otimização de perfil no Google Meu Negócio</li>
                <li>Otimização das mídias (Instagram e Facebook)</li>
            </ul>
        </div>

        <!-- 4. Benefícios da Implementação Section -->
        <div class="section">
            <h2>4. Benefícios da Implementação</h2>
            <p>Os serviços prestados têm como objetivo:</p>
            <ul>
                <li>Aumentar a presença online do Contratante, tornando sua marca mais visível e atraindo maior tráfego e interesse em seus serviços.</li>
                <li>Proporcionar diferenciação competitiva, colocando o Contratante lado a lado com outros prestadores de serviço, destacando-se pela qualidade e proximidade com os clientes locais.</li>
            </ul>
        </div>

        <!-- 5. Valores Comerciais Section -->
        <div class="section">
            <h2>5. Valores Comerciais</h2>
            <div class="pricing-table">
                <div class="pricing-item">
                    <h3>Para o projeto:</h3>
                    <p class="price">R$ 1.000,00</p>
                    <p>Podendo ser parcelado em 5x sem juros com vencimento inicial em 10/11/2024.</p>
                </div>
                
                <div class="pricing-item">
                    <h3>Pagamento recorrente (Mensal):</h3>
                    <ul class="management-plans">
                        <li><b>Hospedagem:</b> R$ 50,00</li>
                        <li><b>Postagens Instagram/Facebook:</b> R$ 150,00</li>
                    </ul>
                    <p><b>Data de vencimento:</b> Todo dia 10 de cada mês.</p>
                </div>
            </div>
        </div>

        <!-- 6. Forma de Pagamento Section -->
        <div class="section">
            <h2>6. Forma de Pagamento</h2>
            <p>
                Os pagamentos deverão ser efetuados via PIX, chave CNPJ: 34.889.330/0001-00, conforme os valores e prazos 
                estabelecidos na seção anterior.
            </p>
        </div>

        <!-- 7. Prazo de Vigência Section -->
        <div class="section">
            <h2>7. Prazo de Vigência</h2>
            <p>
                Este contrato terá início em 01/11/2024 e permanecerá em vigor por 01 ano, 
                podendo ser renovado por acordo mútuo entre as partes.
            </p>
        </div>

        <!-- 8. Rescisão Section -->
        <div class="section">
            <h2>8. Rescisão</h2>
            <p>
                O contrato poderá ser rescindido por qualquer uma das partes mediante notificação por escrito com 
                30 dias de antecedência. Em caso de rescisão, o Contratante deverá quitar quaisquer 
                valores devidos até a data da rescisão.
            </p>
        </div>

        <!-- 9. Disposições Gerais Section -->
        <div class="section">
            <h2>9. Disposições Gerais</h2>
            <ul>
                <li>A Contratada se compromete a prestar os serviços com a qualidade e eficiência acordadas, respeitando os prazos estabelecidos.</li>
                <li>O Contratante se compromete a fornecer todas as informações e materiais necessários para a execução dos serviços.</li>
            </ul>
        </div>

        <!-- 10. Foro Section -->
        <div class="section">
            <h2>10. Foro</h2>
            <p>
                Fica eleito o foro da comarca de [Cidade do Foro], para dirimir quaisquer dúvidas ou litígios 
                oriundos deste contrato.
            </p>
        </div>


        <!-- Aceite do Contrato Section -->
        <div class="section acceptance-section">
            <h2>Aceite do Contrato</h2>
            <form action="<?php echo admin_url('admin-ajax.php'); ?>" method="POST" class="acceptance-form">
                <input type="hidden" name="action" value="process_acceptance">
                <div class="form-group">
                    <input type="text" name="nome" required placeholder="Seu nome completo" class="form-input">
                    <input type="email" name="email" required placeholder="Seu e-mail" class="form-input">
                    <input type="text" name="proposta_nome" required placeholder="Nome da Proposta" class="form-input">
                    <div class="checkbox-group">
                        <input type="checkbox" id="terms" name="terms" required>
                        <label for="terms">Li e aceito os termos do contrato</label>
                    </div>
                    <button type="submit" class="accept-button">Aceitar Contrato</button>
                </div>
            </form>
        </div>

        <!-- Footer Section -->
        <div class="footer">
            <p>#contrato-05.01.11.2024</p>
            <p>Contato: Wagner Sena</p>
            <p>Contato: (13) 9 8112-9460</p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>"; // Define a URL do AJAX

        jQuery(document).ready(function($) {
            $('.acceptance-form').on('submit', function(e) {
                e.preventDefault(); // Impede o envio padrão do formulário

                var formData = $(this).serialize(); // Serializa os dados do formulário

                $.post(ajaxurl, formData, function(response) {
                    if (response.success) {
                        // Redireciona para a página de sucesso
                        window.location.href = 'sucesso.html';
                    } else {
                        alert(response.data); // Exibe a mensagem de erro
                    }
                }).fail(function(jqXHR, textStatus, errorThrown) {
                    alert("Erro na requisição: " + textStatus + " - " + errorThrown);
                });
            });
        });
    </script>
</body>
</html>
