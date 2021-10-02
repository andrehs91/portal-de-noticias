<?php

if (count($_POST)) {
    $allowedTags='<p><strong><em><u><h1><h2><h3><h4><h5><h6><img><li><ol><ul><span><div><br><ins><del>';
    if(count($_POST)) {
        $newsDate = strip_tags(stripslashes($_POST['news-date']));
        $newsTime = strip_tags(stripslashes($_POST['news-time']));
        $newsTitle = strip_tags(stripslashes($_POST['news-title']));
        $newsContent = strip_tags(stripslashes($_POST['news-content']), $allowedTags);
    }
}

require "../source/view/template-header.php";
?>
<div class="card text-center">
    <div class="card-header">
        <h1 class="card-title"><?= $newsTitle ?></h1>
    </div>
    <div class="card-body py-0">
        <p class="card-text"><?= $newsContent ?></p>
    </div>
    <div class="card-footer d-flex justify-content-between align-items-center">
        <small class="text-start text-muted">
            Notícia escrita em 
            <strong><?= date('d/m/Y', strtotime($newsDate)); ?></strong>
            às <strong><?= $newsTime; ?></strong>
        </small>
        <div class="d-print-none text-nowrap">
            <a href="#" role="button" class="text-danger" data-bs-toggle="modal" data-bs-target="#GerarPDF"><svg class="icon">
                <use xlink:href="img/icons.svg#icon-pdf"></use>
            </svg></a>
            <a href="#" role="button" class="text-dark" onclick="window.print()"><svg class="icon">
                <use xlink:href="img/icons.svg#icon-print"></use>
            </svg></a>
        </div>
    </div>
</div>
<div class="modal fade" id="GerarPDF" tabindex="-1" aria-labelledby="GerarPDFLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="GerarPDFLabel">O que deseja fazer?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <a href="#" role="button" class="text-dark"><svg class="icon">
                        <use xlink:href="img/icons.svg#icon-download"></use>
                    </svg>Baixar PDF</a>
                </div>
                <div class="mb-3">
                    <a href="#" role="button" class="text-secondary"><svg class="icon">
                        <use xlink:href="img/icons.svg#icon-contacts"></use>
                    </svg>Enviar para um contato</a>
                </div>
                <div>
                    <a href="#" role="button" class="text-warning"><svg class="icon">
                        <use xlink:href="img/icons.svg#icon-mail"></use>
                    </svg>Enviar por email</a>
                </div>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
<?php
require "../source/view/template-footer.php";

// header('Location: /');
