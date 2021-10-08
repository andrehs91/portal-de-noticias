<?php

namespace PortalDeNoticias\Controller;

use PDO;

class ConexaoMySQL
{
    public static function criarConexao(): PDO
    {
        $conexao = new PDO('mysql:host=' . HOST_NAME . ':' . HOST_PORT . ';dbname=portal_de_noticias', DB_USERNAME, DB_PASSWORD);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexao->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $conexao;
    }
}
