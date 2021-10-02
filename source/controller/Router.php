<?php

namespace NewsPortal\Controller;

class Router
{
    private string $httpMethod;
    private string $uri;
    private array $validRoutes = [];
    
    public function __construct(string $httpMethod, string $uri)
    {
        $this->httpMethod = $httpMethod;
        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        $this->uri = rawurldecode($uri);
        if ($this->uri === "/") {
            $this->uri = "/noticias";
        }
    }
    
    public function addRoute(string $method, string $uri, string $handler): void
    {
        $this->validRoutes[] = [
            "method" => $method,
            "uri" => $uri,
            "handler" => $handler
        ];
    }
    
    public function validateRoute(): array
    {
        $route = [];
        foreach ($this->validRoutes as $validRoute) {
            if ($this->httpMethod === $validRoute["method"] && $this->uri === $validRoute["uri"]) {
                $route["status"] = "FOUND";
                $route["uri"] = $validRoute["uri"];
                $route["handler"] = $validRoute["handler"];
                return $route;
            }
        }
        $route["status"] = "NOT_FOUND";
        return $route;
    }
    
    public function redirect(string $page): void
    {
        require "../source/view/template-header.php";
        require "../source/view/$page.php";
        require "../source/view/template-footer.php";
    }
}
