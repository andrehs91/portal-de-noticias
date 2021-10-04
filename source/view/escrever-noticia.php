<script src="js/tinymce.js"></script>
<h1 class="mb-3">Escrever Notícia</h1>
<section>
    <form method="POST">
        <input type="hidden" name="noticia-dia-criacao" value="<?= date('Y-m-d'); ?>">
        <input type="hidden" name="noticia-hora-criacao" value="<?= date('H:i'); ?>">
        <div class="my-3">
            <label for="noticia-titulo" class="form-label fw-bold">Título:</label>
            <input type="text" class="form-control" name="noticia-titulo" id="noticia-titulo" maxlength="120" required>
        </div>
        <div class="mb-3">
            <label for="noticia-conteudo" class="form-label fw-bold">Conteúdo: </label>
            <textarea name="noticia-conteudo" id="noticia-conteudo" placeholder="..."></textarea>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary px-5">Publicar</button>
        </div>
    </form>
</section>