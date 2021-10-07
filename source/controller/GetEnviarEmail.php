<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$destinatario = "ahs_1991@hotmail.com";
$email = new PHPMailer(true);

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
    $resultado = "Email encaminhado com sucesso!";
} catch (Exception $e) {
    $resultado =  "Houve um problema no envio do email. Erro: {$email->ErrorInfo}";
} finally {
    $titulo = "Envio de notícia por email";
    require "../source/view/template-header.php";
echo <<<EOT
<h1 class="mb-3">Envio de notícia por email</h1>
<section>
<p>$resultado</p>
<p><a href="/">Clique aqui</a> para acessar a página inicial.</p>
</section>
EOT;
    require "../source/view/template-footer.php";
}
