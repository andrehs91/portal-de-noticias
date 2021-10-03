<?php

namespace PortalDeNoticias\Controller;

use PDO;

class ConexaoMySQL
{
    public static function criarConexao(): PDO
    {
        $conexao = new PDO('mysql:host=192.168.1.16:3306;dbname=portal_de_noticias', 'root', 'root');
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexao->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $conexao;
    }
}
