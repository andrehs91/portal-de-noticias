<?php

namespace PortalDeNoticias\Controller;

class Roteador
{
    private string $metodoHTTP;
    private string $uri;
    private array $rotasValidas = [];
    
    public function __construct(string $metodoHTTP, string $uri)
    {
        $this->metodoHTTP = $metodoHTTP;
        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        $this->uri = rawurldecode($uri);
        if ($this->uri === "/") {
            $this->uri = "/noticias";
        }
    }
    
    public function cadastrarRota(string $metodo, string $uri, string $controlador): void
    {
        $this->rotasValidas[] = [
            "metodo" => $metodo,
            "uri" => $uri,
            "controlador" => $controlador
        ];
    }
    
    public function validarRota(): array
    {
        $rota = [];
        foreach ($this->rotasValidas as $rotaValida) {
            if ($this->metodoHTTP === $rotaValida["metodo"] && $this->uri === $rotaValida["uri"]) {
                $rota["status"] = "FOUND";
                $rota["uri"] = $rotaValida["uri"];
                $rota["controlador"] = $rotaValida["controlador"];
                return $rota;
            }
        }
        $rota["status"] = "NOT_FOUND";
        return $rota;
    }
    
    public function redirecionar(string $page): void
    {
        require "../source/view/template-header.php";
        require "../source/view/$page.php";
        require "../source/view/template-footer.php";
        exit;
    }
}
