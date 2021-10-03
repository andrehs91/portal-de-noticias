<script src="js/tinymce.js"></script>
<span class="h1 mb-3">Editar Notícia</span>
<section>
    <form method="POST">
        <input type="hidden" name="noticia-id" value="<?= $noticia->getId(); ?>">
        <input type="hidden" name="noticia-dia-criacao" value="<?= $noticia->getDiaCriacao(); ?>">
        <input type="hidden" name="noticia-hora-criacao" value="<?= $noticia->getHoraCriacao(); ?>">
        <input type="hidden" name="noticia-dia-edicao" value="<?= date('Y-m-d'); ?>">
        <input type="hidden" name="noticia-hora-edicao" value="<?= date('H:i'); ?>">
        <div class="my-3">
            <label for="noticia-titulo" class="form-label fw-bold">Título:</label>
            <input type="text" class="form-control" name="noticia-titulo" id="noticia-titulo" maxlength="120" value="<?= $noticia->getTitulo(); ?>" required>
        </div>
        <div class="mb-3">
            <label for="noticia-conteudo" class="form-label fw-bold">Conteúdo: </label>
            <textarea name="noticia-conteudo" id="noticia-conteudo" placeholder="..."><?= $noticia->getConteudo(); ?></textarea>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary px-5">Confirmar Edição</button>
        </div>
    </form>
</section>