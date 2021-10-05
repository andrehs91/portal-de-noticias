<?php

if (isset($_GET["restaurar"])) {
    if ($_GET["restaurar"] === "true") {
        foreach ($_COOKIE as $chave => $valor) {
            setcookie($chave, null, - 1);
        }
    }
    header('Location: /');
}

$titulo = "Tema";
require "ViewLoader.php";
