<section>
<?php if (isset($noticia)): ?>
    <div class="d-print-none mb-3">
        <a href="/editar-noticia?noticia-id=<?= $noticia->getId(); ?>" role="button" class="text-dark text-nowrap me-sm-3"><svg class="icon">
            <use xlink:href="img/icons.svg#icon-edit"></use>
        </svg>Editar</a>
        <a href="/apagar-noticia?noticia-id=<?= $noticia->getId(); ?>" role="button" class="text-dark text-nowrap me-sm-3" data-bs-toggle="modal" data-bs-target="#Apagar"><svg class="icon">
            <use xlink:href="img/icons.svg#icon-delete"></use>
        </svg>Apagar</a>
        <a href="#" role="button" class="text-dark text-nowrap me-sm-3" onclick="window.print()"><svg class="icon">
            <use xlink:href="img/icons.svg#icon-print"></use>
        </svg>Imprimir</a>
        <a href="#" role="button" class="text-dark text-nowrap me-sm-3" data-bs-toggle="modal" data-bs-target="#GerarPDF"><svg class="icon">
            <use xlink:href="img/icons.svg#icon-pdf"></use>
        </svg>Gerar PDF</a>
        <a href="/" role="button" class="text-dark text-nowrap"><svg class="icon">
            <use xlink:href="img/icons.svg#icon-back"></use>
        </svg>Voltar</a>
    </div>
    <article class="card">
        <div class="card-header text-center text-white">
            <h1 class="card-title h2"><?= $noticia->getTitulo(); ?></h1>
        </div>
        <div class="card-body">
            <?= $noticia->getConteudo(); ?>
        </div>
        <div class="card-footer">
            <small class="text-muted">
                Notícia escrita em 
                <strong><?= $noticia->getDiaCriacao('d/m/Y'); ?></strong>
                às <strong><?= $noticia->getHoraCriacao(); ?></strong>
                <?php if ($noticia->getDiaEdicao() !== null && $noticia->getHoraEdicao() !== null): ?>
                    e editada pela última vez em 
                    <strong><?= $noticia->getDiaEdicao('d/m/Y'); ?></strong>
                    às <strong><?= $noticia->getHoraEdicao(); ?></strong>
                <?php endif; ?>
            </small>
        </div>
    </article>
    <div class="d-print-none text-end mt-3">
        <a href="/" role="button" class="text-dark"><svg class="icon">
            <use xlink:href="img/icons.svg#icon-back"></use>
        </svg>Voltar</a>
    </div>
<?php endif; ?>
</section>
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
                    <a href="#" role="button" class="text-dark"><svg class="icon">
                        <use xlink:href="img/icons.svg#icon-contacts"></use>
                    </svg>Enviar para um contato</a>
                </div>
                <div>
                    <a href="#" role="button" class="text-dark"><svg class="icon">
                        <use xlink:href="img/icons.svg#icon-mail"></use>
                    </svg>Enviar por email</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="Apagar" tabindex="-1" aria-labelledby="ApagarLabel" aria-hidden="true">
    <form method="POST" action="/apagar-noticia">
        <input type="hidden" name="noticia-id" value="<?= $noticia->getId(); ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title" id="ApagarLabel">Atenção!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" role="alert">Não será possível recuperar esta notícia caso ela seja apagada!</div>
                    <p class="text-center">Tem certeza que deseja apagá-la?</p>
                </div>
                <div class="modal-footer justify-content-center bg-light">
                    <button type="submit" class="btn btn-danger px-5 me-2" >Sim</button>
                    <button type="button" class="btn btn-secondary px-5 ms-2" data-bs-dismiss="modal">Não</button>
                </div>
            </div>
        </div>
    </form>
</div>