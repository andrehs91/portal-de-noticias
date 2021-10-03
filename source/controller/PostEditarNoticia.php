<?php

use PortalDeNoticias\DAO\NoticiaDAO;
use PortalDeNoticias\Model\Noticia;

$noticiaDAO = new NoticiaDAO($conexao);
if(count($_POST)) {
    $noticia = new Noticia(id: $_POST['noticia-id'],
                           diaCriacao: $_POST['noticia-dia-criacao'],
                           horaCriacao: $_POST['noticia-hora-criacao'],
                           diaEdicao: $_POST['noticia-dia-edicao'],
                           horaEdicao: $_POST['noticia-hora-edicao'],
                           titulo: $_POST['noticia-titulo'],
                           conteudo: $_POST['noticia-conteudo']);
    $noticiaDAO->editar($noticia);
    header('Location: /');
}
