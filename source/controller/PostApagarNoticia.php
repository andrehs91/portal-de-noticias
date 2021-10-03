<?php

use PortalDeNoticias\DAO\NoticiaDAO;

if (!isset($_POST["noticia-id"])) $roteador->redirecionar("noticia-nao-encontrada");

$id = filter_input(INPUT_POST, "noticia-id");
$noticiaDAO = new NoticiaDAO($conexao);
$noticia = $noticiaDAO->apagar($id);

header('Location: /');
