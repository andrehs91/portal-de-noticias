<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$pdf = "temp/noticia.pdf";

$email = new PHPMailer(true);

try {
    $email->IsMail();
    $email->setFrom('portaldenoticias@andrehenrique.tech', 'Portal de Notícias');
    $email->addAddress('ahs_1991@hotmail.com', 'Andre Henrique');
    $email->addAttachment($pdf);
    $email->isHTML(true);
    $email->Subject = 'Portal de Notícias';
    $email->Body    = 'Notícia encaminhada pelo <a href="https://pdn.andrehenrique.tech">Portal de Notícias</a>.';
    $email->AltBody = 'Notícia encaminhada pelo "Portal de Notícias", endereço https://pdn.andrehenrique.tech.';
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
