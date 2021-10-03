<?php

use PortalDeNoticias\DAO\NoticiaDAO;

$noticiaDAO = new NoticiaDAO($conexao);
if (isset($_GET["parte"]) && $_GET["parte"] !== "") {
    $noticias = $noticiaDAO->buscar(filter_input(INPUT_GET, "parte"));
} else {
    $noticias = $noticiaDAO->lerTodas();
}

require "ViewLoader.php";
