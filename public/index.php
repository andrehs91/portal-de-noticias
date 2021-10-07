<?php

ini_set('display_errors', 1);         // Remover em produção
ini_set('display_startup_errors', 1); // Remover em produção
error_reporting(E_ALL);               // Remover em produção

require_once "../autoload.php";
require_once "../vendor/autoload.php";

use PortalDeNoticias\Controller\Roteador;
use PortalDeNoticias\Controller\ConexaoMySQL;

$roteador = new Roteador($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
$roteador->cadastrarRota('GET', '/noticias', 'GetNoticias');
$roteador->cadastrarRota('GET', '/ler-noticia', 'GetLerNoticia');
$roteador->cadastrarRota('GET', '/escrever-noticia', 'GetEscreverNoticia');
$roteador->cadastrarRota('GET', '/editar-noticia', 'GetEditarNoticia');
$roteador->cadastrarRota('GET', '/tema', 'GetTema');
$roteador->cadastrarRota('GET', '/gerar-pdf', 'GetGerarPDF');
$roteador->cadastrarRota('POST', '/escrever-noticia', 'PostEscreverNoticia');
$roteador->cadastrarRota('POST', '/editar-noticia', 'PostEditarNoticia');
$roteador->cadastrarRota('POST', '/apagar-noticia', 'PostApagarNoticia');
$roteador->cadastrarRota('POST', '/tema', 'PostTema');
$roteador->cadastrarRota('POST', '/enviar-email', 'PostEnviarEmail');

$rota = $roteador->validarRota();
switch ($rota["situacao"]) {
    case "NOT_FOUND":
        $roteador->redirecionar("404");
        break;
    case "FOUND":
        try {
            $conexao = ConexaoMySQL::criarConexao();
            require "../source/controller/" . $rota["controlador"] . ".php";
        } catch (Throwable $throwable) {
            // Transformar em LOG
            echo "<pre>";
            echo "getFile: " . $throwable->getFile() . PHP_EOL;
            echo "getLine: " . $throwable->getLine() . PHP_EOL;
            echo "getMessage: " . $throwable->getMessage() . PHP_EOL;
            echo "getTraceAsString: " . $throwable->getTraceAsString() . PHP_EOL;
            echo "</pre>";
        }
        break;
}
