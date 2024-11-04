<?php
/*
Plugin Name: Meu Plugin de Email
Description: Um plugin para enviar emails usando PHPMailer.
Version: 1.0
Author: Seu Nome
*/

add_action('wp_ajax_process_acceptance', 'process_acceptance');
add_action('wp_ajax_nopriv_process_acceptance', 'process_acceptance'); // Para usuários não logados

function process_acceptance() {
    // Verifique se os dados do formulário foram enviados
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['terms'])) {
        // Recebe e sanitiza os dados do formulário
        $nome = sanitize_text_field(trim($_POST['nome']));
        $email = sanitize_email(trim($_POST['email']));
        $proposta_nome = sanitize_text_field(trim($_POST['proposta_nome']));

        // Crie uma instância do PHPMailer
        $mail = new PHPMailer\PHPMailer\PHPMailer();

        try {
            // Configurações do servidor
            $mail->isSMTP();                                            // Defina o uso do SMTP
            $mail->Host       = 'mail.coddar.com.br';                 // Defina o servidor SMTP
            $mail->SMTPAuth   = true;                                 // Ative a autenticação SMTP
            $mail->Username   = 'comercial@coddar.com.br';            // Seu email
            $mail->Password   = 'ARMA#7110com';                        // Sua senha
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;      // Ative a criptografia TLS
            $mail->Port       = 587;                                  // Porta TCP para conexão

            // Remetente e destinatário
            $mail->setFrom('comercial@coddar.com.br', 'Coddar');
            $mail->addAddress($email, $nome); // Adicione o destinatário

            // Conteúdo do email
            $mail->isHTML(true);                                      // Defina o formato do email como HTML
            $mail->Subject = "Confirmação de Aceite - Proposta: $proposta_nome";
            $mail->Body    = "Olá, <strong>$nome</strong>!<br>Agradecemos o seu aceite na proposta: <strong>$proposta_nome</strong>.";
            $mail->AltBody = "Olá, $nome! Agradecemos o seu aceite na proposta: $proposta_nome."; // Texto alternativo

            // Envie o email
            if ($mail->send()) {
                wp_send_json_success('Email enviado com sucesso!');
            } else {
                wp_send_json_error('Erro ao enviar o e-mail. Tente novamente.');
            }
        } catch (Exception $e) {
            wp_send_json_error("O email não pôde ser enviado. Erro: {$mail->ErrorInfo}");
        }
    } else {
        wp_send_json_error('Você deve aceitar os termos do contrato para prosseguir.');
    }
}
?>

