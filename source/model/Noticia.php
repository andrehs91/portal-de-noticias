<?php

namespace PortalDeNoticias\Model;

use \DateTime;

class Noticia
{
    private ?int $id;
    private DateTime $diaCriacao;
    private string $horaCriacao;
    private ?DateTime $diaEdicao;
    private ?string $horaEdicao;
    private string $titulo;
    private string $conteudo;
    
    public function __construct(int $id = null,
                                string $diaCriacao,
                                string $horaCriacao,
                                string $diaEdicao = null,
                                string $horaEdicao = null,
                                string $titulo,
                                string $conteudo)
    {
        $this->id = $id;
        $this->diaCriacao = new DateTime($diaCriacao);
        if (preg_match("/([0-1][0-9]|[2][0-3]):[0-5][0-9]/i", $horaCriacao)) {
            $this->horaCriacao = $horaCriacao;
        }
        $this->diaEdicao = new DateTime($diaEdicao);
        if (preg_match("/([0-1][0-9]|[2][0-3]):[0-5][0-9]/i", $horaEdicao)) {
            $this->horaEdicao = $horaEdicao;
        }
        $this->titulo = strip_tags(stripslashes($titulo));
        $this->conteudo = strip_tags(stripslashes($conteudo), '<h2><h3><h4><h5><h6><p><strong><em><u><ins><del><span><li><ol><ul><div><br><a><sup><sub><hr><table><thead><tbody><tfoot><tr><th><td><img><code><iframe>');
    }
    
    public function getId(): int
    { return $this->id; }
    
    public function getDiaCriacao(string $format = "Y-m-d"): string
    { return $this->diaCriacao->format($format); }
    
    public function getHoraCriacao(): string
    { return $this->horaCriacao; }
    
    public function getDiaEdicao(string $format = "Y-m-d"): ?string
    { return isset($this->diaEdicao) ? $this->diaEdicao->format($format) : null; }
    
    public function getHoraEdicao(): ?string
    { return isset($this->horaEdicao) ? $this->horaEdicao : null; }
    
    public function getTitulo(): string
    { return $this->titulo; }
    
    public function getConteudo(): string
    { return $this->conteudo; }
}
