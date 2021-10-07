<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$email = new PHPMailer(true);

$titulo = "Envio de notícia por email";
function html($conteudo)
{
    require "../source/view/template-header.php";
    echo "<h1 class='mb-3'>Envio de notícia por email</h1><section><p>$conteudo</p><p><a href='javascript:history.back()'>Clique aqui</a> para voltar.</p></section>";
    require "../source/view/template-footer.php";
}

if (isset($_POST["destinatario"])) {
    $destinatario = filter_input(INPUT_POST, "destinatario");

    try {
        $email->Encoding   = 'base64';
        $email->CharSet    = 'UTF-8';
        // $email->SMTPDebug  = SMTP::DEBUG_SERVER;
        $email->isSMTP();
        $email->Host       = 'smtp.gmail.com';
        $email->SMTPAuth   = true;
        $email->Username   = '';
        $email->Password   = '';
        $email->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $email->Port       = 587;
        
        $email->setFrom('portaldenoticias@andrehenrique.tech', 'Portal de Notícias');
        $email->addAddress($destinatario);
        $email->addAttachment("temp/noticia.pdf");
        $email->isHTML(true);
        $email->Subject = 'Portal de Notícias';
        $email->Body    = '<p>Olá!</p><p>Segue anexa uma notícia encaminhada pelo <a href="https://pdn.andrehenrique.tech">Portal de Notícias</a>, um projeto desenvolvido por André Henrique (c129141) conforme especificado na etapa de <strong>Produção Temática</strong> do <strong>PSI 12017</strong> para a vaga de Assistente Júnior demandado pela <strong>unidade 5263</strong>.</p>';
        $email->AltBody = 'Segue anexa uma notícia encaminhada pelo "Portal de Notícias", endereço https://pdn.andrehenrique.tech, um projeto desenvolvido por André Henrique (c129141) conforme especificado na etapa de Produção Temática do PSI 12017 para a vaga de Assistente Júnior demandado pela unidade 5263.';
        $email->send();
        $conteudo = "Email encaminhado com sucesso!";
    } catch (Exception $e) {
        $conteudo = "Houve um problema no envio do email.";
    } finally {
        html($conteudo);
    }
} else {
    $conteudo = "O endereço de email do destinatário não foi informado.";
    html($conteudo);
}
