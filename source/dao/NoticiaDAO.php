<?php

namespace PortalDeNoticias\DAO;

use PDO;
use PortalDeNoticias\Model\Noticia;

class NoticiaDAO
{
    private PDO $conexao;
    
    public function __construct(PDO $conexao)
    {
        $this->connection = $conexao;
    }
    
    public function novaNoticia(array $dadosNoticia): Noticia
    {
        return new Noticia(id: $dadosNoticia['id'],
                           diaCriacao: $dadosNoticia['dia_criacao'],
                           horaCriacao: $dadosNoticia['hora_criacao'],
                           diaEdicao: $dadosNoticia['dia_edicao'],
                           horaEdicao: $dadosNoticia['hora_edicao'],
                           titulo: $dadosNoticia['titulo'],
                           conteudo: $dadosNoticia['conteudo']);
    }
    
    private function novasNoticias(array $dadosNoticias): array
    {
        foreach ($dadosNoticias as $chave => $dadosNoticia) {
            $dadosNoticias[$chave]["conteudo"] = strip_tags(stripslashes($dadosNoticia["conteudo"]), '<h2><h3><h4><h5><h6><p><strong><em><u><ins><del><span><div><br><a><sup><sub>');
        }
        $noticias = [];
        foreach ($dadosNoticias as $dadosNoticia) {
            $noticias[] = $this->novaNoticia($dadosNoticia);
        }
        return $noticias;
    }
    
    public function criar(Noticia $noticia): bool
    {
        $query = '  INSERT INTO noticias 
                        (dia_criacao, hora_criacao, titulo, conteudo)
                    VALUES
                        (:dia_criacao, :hora_criacao, :titulo, :conteudo);';
        $statement = $this->connection->prepare($query);
        $statement->bindValue(':dia_criacao', $noticia->getDiaCriacao());
        $statement->bindValue(':hora_criacao', $noticia->getHoraCriacao());
        $statement->bindValue(':titulo', $noticia->getTitulo());
        $statement->bindValue(':conteudo', $noticia->getConteudo());
        return $statement->execute();
    }
    
    public function lerUma(int $id): ?Noticia
    {
        $query = 'SELECT * FROM noticias WHERE id = :id;';
        $statement = $this->connection->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $dadosNoticia = $statement->fetch();
        if (!$dadosNoticia) return null;
        return $this->novaNoticia($dadosNoticia);
    }
    
    public function lerTodas(): ?array
    {
        $result = $this->connection->query('SELECT * FROM noticias;');
        $dadosNoticias = $result->fetchAll();
        if (!count($dadosNoticias)) return null;
        return $this->novasNoticias(array_reverse($dadosNoticias));
    }
    
    public function editar(Noticia $noticia): bool
    {
        $query = '  UPDATE noticias
                    SET dia_edicao = :dia_edicao,
                        hora_edicao = :hora_edicao,
                        titulo = :titulo,
                        conteudo = :conteudo
                    WHERE id = :id;';
        $statement = $this->connection->prepare($query);
        $statement->bindValue(':dia_edicao', $noticia->getDiaEdicao());
        $statement->bindValue(':hora_edicao', $noticia->getHoraEdicao());
        $statement->bindValue(':titulo', $noticia->getTitulo());
        $statement->bindValue(':conteudo', $noticia->getConteudo());
        $statement->bindValue(':id', $noticia->getId());
        return $statement->execute();
    }
    
    public function apagar(int $id): bool
    {
        $query = 'DELETE FROM noticias WHERE id = :id;';
        $statement = $this->connection->prepare($query);
        $statement->bindValue(':id', $id);
        return $statement->execute();
    }
    
    public function buscar(string $parte): ?array
    {
        $query = 'SELECT * FROM noticias WHERE titulo LIKE :titulo OR conteudo LIKE :conteudo;';
        $statement = $this->connection->prepare($query);
        $statement->bindValue(":titulo", "%" . $parte . "%");
        $statement->bindValue(":conteudo", "%" . $parte . "%");
        $statement->execute();
        $dadosNoticias = $statement->fetchAll();
        if (!count($dadosNoticias)) return null;
        return $this->novasNoticias(array_reverse($dadosNoticias));
    }
}
