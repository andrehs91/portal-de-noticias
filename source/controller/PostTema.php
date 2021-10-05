<?php

if (count($_POST)) {
    foreach ($_POST as $chave => $valor) {
        setcookie($chave, $valor, time() + (86400 * 30));
    }
}

header('Location: /');
