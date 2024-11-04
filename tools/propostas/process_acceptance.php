<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe e sanitiza os dados do formulário
    $nome = htmlspecialchars(trim($_POST['nome']), ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars(trim($_POST['email']), ENT_QUOTES, 'UTF-8');
    $proposta_nome = htmlspecialchars(trim($_POST['proposta_nome']), ENT_QUOTES, 'UTF-8'); // Novo campo

    if (isset($_POST['terms'])) {
        // Configurações do e-mail
        $to = $email;
        $subject = "Confirmação de Aceite - Proposta: $proposta_nome"; // Usando o nome da proposta
        $message = "
            Olá, $nome!<br><br>
            Agradecemos o seu aceite na proposta de prestação de serviços: <strong>$proposta_nome</strong>.<br>
            Seu aceite foi registrado com sucesso.<br><br>
            Qualquer dúvida, estamos à disposição.<br><br>
            Atenciosamente,<br>
            KF Piscinas
        ";

        // Envia o e-mail usando wp_mail
        if (wp_mail($to, $subject, $message)) {
            header("Location: sucesso.html");
            exit();
        } else {
            echo "Erro ao enviar o e-mail. Tente novamente.";
        }
    } else {
        echo "Você deve aceitar os termos do contrato para prosseguir.";
    }
} else {
    echo "Método de requisição inválido.";
}
?>
