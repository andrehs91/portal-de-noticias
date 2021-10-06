<?php

use PortalDeNoticias\DAO\NoticiaDAO;
use Dompdf\Dompdf;
use Dompdf\Options;

if (!isset($_GET["noticia-id"])) $roteador->redirecionar("noticia-nao-encontrada");

$id = filter_input(INPUT_GET, "noticia-id");
$noticiaDAO = new NoticiaDAO($conexao);
$noticia = $noticiaDAO->lerUma($id);

if (!$noticia) $roteador->redirecionar("noticia-nao-encontrada");

$noticiaHTML = <<<EOT
<html>
<head>
<style>
.card {
    position: relative;
    word-wrap: break-word;
    background-color: #fff;
    border: 1px solid #bcbebf;
    border-radius: 4px;
}
.card-header {
    background-color: #0d6efd;
    padding: 8px 16px;
    margin-bottom: 0;
    border-bottom: 1px solid #bcbebf;
    border-radius: 4px 4px 0 0;
}
.card-title {
    margin-bottom: 8px;
}
.card-body {
    padding: 16px 16px;
}
.card-footer {
    background-color: #f0f0f0;
    padding: 8px 16px;
    border-top: 1px solid #bcbebf;
    border-radius: 0 0 4px 4px;
}
.text-white {
    color: #ffffff;
}
.text-center {
    text-align: center;
}
.text-muted {
    color: #6c757d;
}
h1, h2, h3, h4, h5, h6 {
    margin-top: 0;
    margin-bottom: 8px;
    font-weight: 500;
}
div {
    display: block;
}
p {
    display: block;
    margin-top: 0;
    margin-bottom: 16px;
}
img {
    max-width: 100%;
}
hr {
    margin: 16px 0;
    color: #bcbebf;
    background-color: #bcbebf;
    border: 0;
}
</style>
EOT;

if (count($_COOKIE)) {
    $noticiaHTML .=  '<style>';
    $noticiaHTML .=  '.card-header { background-color:' . $_COOKIE["cor-fundo-cabecalho"] . '; }';
    $noticiaHTML .=  '.card-header h1 { color:' . $_COOKIE["cor-fonte-cabecalho"] . '; }';
    $noticiaHTML .=  '.card { background-color:' . $_COOKIE["cor-fundo-corpo"] . '; }';
    $noticiaHTML .=  '.card { color:' . $_COOKIE["cor-fonte-corpo"] . '; }';
    $noticiaHTML .=  '.card a { color:' . $_COOKIE["cor-fundo-cabecalho"] . '; }';
    $noticiaHTML .=  '.card-body-content * { color:' . $_COOKIE["cor-fonte-corpo"] . ' !important; }';
    $noticiaHTML .=  '.card-footer { background-color:' . $_COOKIE["cor-fundo-rodape"] . '; }';
    $noticiaHTML .=  '.card-footer .text-muted { color:' . $_COOKIE["cor-fonte-rodape"] . ' !important; }';
    $noticiaHTML .=  '.card { border-color:' . $_COOKIE["cor-bordas"] . '; }';
    $noticiaHTML .=  '</style>';
}

$noticiaHTML .= <<<EOT
</head>
<body>
<main>
<h1>Portal de Notícias</h1>
<article class="card">
<div class="card-header text-center text-white">
<h1 class="card-title">{$noticia->getTitulo()}</h1>
</div>
<div class="card-body">
{$noticia->getConteudo()}
</div>
<div class="card-footer">
<small class="text-muted">
Notícia escrita em 
<strong>{$noticia->getDiaCriacao('d/m/Y')}</strong>
às <strong>{$noticia->getHoraCriacao()}</strong> 
EOT;

if ($noticia->getDiaEdicao() && $noticia->getHoraEdicao()) {
$noticiaHTML .= <<<EOT
e editada pela última vez em 
<strong>{$noticia->getDiaEdicao('d/m/Y')}</strong>
às <strong>{$noticia->getHoraEdicao()}</strong>
EOT;
}

$noticiaHTML .= <<<EOT
</small>
</div>
</article>
</main>
</body>
</html>
EOT;

$options = new Options();
$options->set('isRemoteEnabled', true);
$dompdf = new Dompdf($options);
$dompdf->loadHtml($noticiaHTML);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
file_put_contents("temp/noticia.pdf", $dompdf->output());

$titulo = "Notícia em PDF";
require "ViewLoader.php";
