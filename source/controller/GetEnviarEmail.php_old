<?php

// $pdf = "temp/noticia.pdf";

try {
    $destino = "ahs_1991@hotmail.com";
    $assunto = "Portal de Notícias";
    $conteudo = "Notícia encaminhada pelo <a href='https://pdn.andrehenrique.tech'>Portal de Notícias</a>.";

    $cabecalhos  = "MIME-Version: 1.0\r\n";
    $cabecalhos .= "Content-type: text/html; charset=iso-8859-1\r\n";
    $cabecalhos .= "From: Portal de Noticias <portaldenoticias@andrehenrique.tech>\r\n";
    $cabecalhos .= "Reply-To: Portal de Noticias <portaldenoticias@andrehenrique.tech>\r\n";

    $email = mail($destino, $assunto, $conteudo, $cabecalhos);
    // $resultado = "Email encaminhado com sucesso!";
} catch (Throwable $throwable) {
    // $resultado = "Houve um problema no envio do email.";
    echo "<pre>";
    echo "getFile: " . $throwable->getFile() . PHP_EOL;
    echo "getLine: " . $throwable->getLine() . PHP_EOL;
    echo "getMessage: " . $throwable->getMessage() . PHP_EOL;
    echo "getTraceAsString: " . $throwable->getTraceAsString() . PHP_EOL;
    echo "</pre>";
} finally {
    $titulo = "Envio de notícia por email";
    require "../source/view/template-header.php";
    echo "<h1 class='mb-3'>Envio de notícia por email</h1><section><p>$resultado</p><p><a href='/'>Clique aqui</a> para acessar a página inicial.</p></section>";
    require "../source/view/template-footer.php";
}





#############################

    // $eol  = "\r\n";
    // $uid = md5(uniqid(time()));

    // $headers .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"$eol" . $eol;
    // $headers .= "This is a multi-part message in MIME format." . $eol;
    // $headers .= "--".$uid."" . $eol;
    // $headers .= "Content-type:text/html; charset=UTF-8" . $eol;
    // $headers .= "Content-Transfer-Encoding: 7bit$eol" . $eol;

    // $arquivo = basename($pdf);
    // $conteudo = chunk_split(base64_encode(file_get_contents($arquivo)));
    // $headers .= "--".$uid."" . $eol;
    // $headers .= "Content-Type: application/octet-stream; name=\"".$fileName."\"" . $eol;
    // $headers .= "Content-Transfer-Encoding: base64" . $eol;
    // $headers .= "Content-Disposition: attachment; filename=\"".$fileName."\"$eol" . $eol;
    // $headers .= $conteudo."$eol" . $eol;
    // $headers .= "--".$uid."--";

#############################

// function sendMail(
//     string $fileAttachment,
//     string $mailMessage = MAIL_CONF["mailMessage"],
//     string $subject     = MAIL_CONF["subject"],
//     string $toAddress   = MAIL_CONF["toAddress"],
//     string $fromMail    = MAIL_CONF["fromMail"]
// ): bool {
   
//     $fileAttachment = trim($fileAttachment);
//     $from           = $fromMail;
//     $pathInfo       = pathinfo($fileAttachment);
//     $attchmentName  = "attachment_".date("YmdHms").(
//     (isset($pathInfo['extension']))? ".".$pathInfo['extension'] : ""
//     );
   
//     $attachment    = chunk_split(base64_encode(file_get_contents($fileAttachment)));
//     $boundary      = "PHP-mixed-".md5(time());
//     $boundWithPre  = "\n--".$boundary;
   
//     $headers   = "From: $from";
//     $headers  .= "\nReply-To: $from";
//     $headers  .= "\nContent-Type: multipart/mixed; boundary=\"".$boundary."\"";
   
//     $message   = $boundWithPre;
//     $message  .= "\n Content-Type: text/plain; charset=UTF-8\n";
//     $message  .= "\n $mailMessage";
   
//     $message .= $boundWithPre;
//     $message .= "\nContent-Type: application/octet-stream; name=\"".$attchmentName."\"";
//     $message .= "\nContent-Transfer-Encoding: base64\n";
//     $message .= "\nContent-Disposition: attachment\n";
//     $message .= $attachment;
//     $message .= $boundWithPre."--";
   
//     return mail($toAddress, $subject, $message, $headers);
// }

#############################
