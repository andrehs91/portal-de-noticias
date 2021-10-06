<?php

spl_autoload_register(
    function (string $namespace): void
    {
        $namespace = str_replace("PortalDeNoticias\\", "", $namespace);
        $namespace = str_replace("\\", DIRECTORY_SEPARATOR, $namespace);
        $path = str_replace('public', 'source', getcwd()) . DIRECTORY_SEPARATOR . $namespace . '.php';

        include_once $path;
    }
);
