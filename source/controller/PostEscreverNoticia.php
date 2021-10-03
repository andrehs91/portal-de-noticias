<?php

use PortalDeNoticias\DAO\NoticiaDAO;
use PortalDeNoticias\Model\Noticia;

$noticiaDAO = new NoticiaDAO($conexao);
if(count($_POST)) {
    $noticia = new Noticia(diaCriacao: $_POST['noticia-dia-criacao'],
                           horaCriacao: $_POST['noticia-hora-criacao'],
                           titulo: $_POST['noticia-titulo'],
                           conteudo: $_POST['noticia-conteudo']);
    $noticiaDAO->criar($noticia);
    header('Location: /');
}
