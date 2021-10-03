<?php

use PortalDeNoticias\DAO\NoticiaDAO;

if (!isset($_GET["noticia-id"])) $roteador->redirecionar("noticia-nao-encontrada");

$id = filter_input(INPUT_GET, "noticia-id");
$noticiaDAO = new NoticiaDAO($conexao);
$noticia = $noticiaDAO->lerUma($id);

if (!$noticia) $roteador->redirecionar("noticia-nao-encontrada");

$titulo = $noticia->getTitulo();
require "ViewLoader.php";
