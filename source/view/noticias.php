<h1 class="mb-3">Notícias</h1>
<section class="mb-3">
    <form method="GET">
        <label class="d-inline-block d-md-none form-label text-nowrap" for="parte">Busque uma notícia:</label>
        <div class="d-flex align-items-end">
            <label class="d-none d-md-inline-block form-label text-nowrap" for="parte">Busque uma notícia:</label>
            <input class="form-control ms-md-2 me-2" type="search" name="parte" id="parte" placeholder="Ditige uma parte do título ou do conteúdo" aria-label="Buscar notícia" value="<?= (isset($_GET["parte"]) && $_GET["parte"] !== "") ? filter_input(INPUT_GET, "parte") : "" ; ?>">
            <button class="btn btn-primary me-2" type="submit">Buscar</button><a class="btn btn-secondary" href="/" role="button">Limpar</a>
        </div>
    </form>
</section>
<hr>
<section class="row g-0">
<?php if (isset($noticias)): ?>
    <?php foreach ($noticias as $noticia): ?>
    <div class="col-2 col-md-1 timeline">
        <div class="alert alert-dark text-center p-0">
            <?= $noticia->getDiaCriacao('d/m'); ?>
        </div>
    </div>
    <div class="col-10 col-md-11 ps-3 pb-3">
        <div class="card">
            <div class="card-header text-center text-white">
                <a class="card-title link-light text-decoration-none" href="/ler-noticia?noticia-id=<?= $noticia->getId(); ?>"><h1 class="h3"><?= $noticia->getTitulo(); ?></h1></a>
            </div>
            <div class="card-body">
                <div class="card-body-content">
                    <?= $noticia->getConteudo(); ?>
                </div>
                <div class="text-center mt-2">
                    <a href="/ler-noticia?noticia-id=<?= $noticia->getId(); ?>">Continuar lendo</a>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
<?php else: ?>
    <div class="alert alert-secondary mt-3" role="alert">Nenhuma notícia foi encontrada.</div>
<?php endif; ?>
</section>