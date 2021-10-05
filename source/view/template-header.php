<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($titulo) ? $titulo . " - " : "" ?>Portal de Notícias</title>
    <link rel="icon" href="img/favicon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <script src='https://cdn.tiny.cloud/1/t5rfiy2vb2lml9qffs0gys0y76u96mfybkwp9mtciia4x2sr/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
    <?php 
        if (count($_COOKIE)) {
            echo '<style>';
                if (isset($_COOKIE["imagem-fundo"]) && $_COOKIE["imagem-fundo"] !== "on") echo '.card-body { background-image: url("' . $_COOKIE["imagem-fundo"] . '"); background-position: center; background-repeat: repeat; background-size: cover; }';
                if (isset($_COOKIE["cor-fundo-cabecalho"])) echo '.card-header { background-color:' . $_COOKIE["cor-fundo-cabecalho"] . '; }';
                if (isset($_COOKIE["cor-fonte-cabecalho"])) echo '.card-header h1 { color:' . $_COOKIE["cor-fonte-cabecalho"] . '; }';
                if (isset($_COOKIE["cor-fundo-corpo"])) echo '.card { background-color:' . $_COOKIE["cor-fundo-corpo"] . '; }';
                if (isset($_COOKIE["cor-fonte-corpo"])) echo '.card { color:' . $_COOKIE["cor-fonte-corpo"] . '; }';
                if (isset($_COOKIE["cor-fundo-rodape"])) echo '.card-footer { background-color:' . $_COOKIE["cor-fundo-rodape"] . '; }';
                if (isset($_COOKIE["cor-fonte-rodape"])) echo '.card-footer .text-muted { color:' . $_COOKIE["cor-fonte-rodape"] . ' !important; }';
                if (isset($_COOKIE["cor-bordas"])) echo '.card { border-color:' . $_COOKIE["cor-bordas"] . '; }';
            echo '</style>';
        }
    ?>
</head>
<body class="bg-light">
    <header class="d-print-none bg-dark">
        <nav class="container navbar navbar-expand-sm navbar-dark py-3">
            <a class="navbar-brand fw-bold" href="/">
                <svg class="logo"><use xlink:href="img/icons.svg#icon-logo"></use></svg>
                Portal de Notícias
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarToggler">
                <ul class="navbar-nav text-center">
                    <li class="nav-item mx-2 mb-2 mb-sm-0">
                        <a class="nav-link<?= $rota['uri'] === '/escrever-noticia' ? ' active' : '' ; ?>" href="/escrever-noticia">Escrever Notícia</a>
                    </li>
                    <li class="nav-item mb-2 mb-sm-0">
                        <a class="btn btn-primary btn-icon" href="/tema" role="button">
                            <svg><use xlink:href="img/icons.svg#icon-theme"></use></svg>
                            Alterar Tema
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main class="container py-3">