<?php

ini_set('display_errors', 1);         // Remover em produção
ini_set('display_startup_errors', 1); // Remover em produção
error_reporting(E_ALL);               // Remover em produção

require_once "../vendor/autoload.php";

use NewsPortal\Controller\Router;

$router = new Router($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
$router->addRoute('GET', '/noticias', 'GetNoticias');
$router->addRoute('GET', '/ler-noticia', 'GetLerNoticia');
$router->addRoute('GET', '/escrever-noticia', 'GetEscreverNoticia');
$router->addRoute('GET', '/editar-noticia', 'GetEditarNoticia');
$router->addRoute('GET', '/apagar-noticia', 'GetApagarNoticia');
$router->addRoute('GET', '/tema', 'GetTema');
$router->addRoute('POST', '/escrever-noticia', 'PostEscreverNoticia');
$router->addRoute('POST', '/editar-noticia', 'PostEditarNoticia');
$router->addRoute('POST', '/apagar-noticia', 'PostApagarNoticia');
$router->addRoute('POST', '/tema', 'PostTema');

$route = $router->validateRoute();
switch ($route["status"]) {
    case "NOT_FOUND":
        $router->redirect("404");
        break;
    case "FORBIDDEN":
        $router->redirect("403"); // Autenticado, mas sem permissão
        break;
    case "UNAUTHORIZED":
        $router->redirect("401"); // Não autenticado
        break;
    case "FOUND":
        try {
            require "../source/controller/" . $route["handler"] . ".php";
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
