<div class="alert alert-secondary" role="alert">
    <svg class="icon"><use xlink:href="img/icons.svg#icon-cookies"></use></svg>
    Este site usa <em>cookies</em> para salvar as alterações no tema das notícias. Ao salvar uma alteração você estará concordando com isto.
</div>
<h1 class="d-inline-block mb-3">Alterar Tema</h1>
<a class="d-inline-block btn btn-dark ms-3 mb-3" href="/tema?restaurar=true" role="button">Restaurar Padrão</a>
<section>
    <form method="POST">
        <hr>
        <div class="row align-items-end">
            <div class="col-8 col-lg-4 text-end">
                <div class="form-label fw-bold">Imagem de fundo:</div>
            </div>
            <div class="col-4 col-lg-8">
                <button class="btn btn-primary me-2" type="button" data-bs-toggle="modal" data-bs-target="#Escolher">Escolher</button>
                <div class="modal fade" id="Escolher" tabindex="-1" aria-labelledby="EscolherLabel" aria-hidden="true">
                    <input type="hidden" name="noticia-id" value="">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-light">
                                <h5 class="modal-title" id="EscolherLabel">Escolha uma imagem de fundo</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="imagem-fundo" id="img0" checked>
                                    <label class="form-check-label" for="img0">Sem imagem de fundo</label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="imagem-fundo" id="img1" value="img/bg-1.jpg">
                                    <label class="form-check-label" for="img1"><img src="img/bg-1.jpg"></label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="imagem-fundo" id="img2" value="img/bg-2.jpg">
                                    <label class="form-check-label" for="img2"><img src="img/bg-2.jpg"></label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="imagem-fundo" id="img3">
                                    <label class="form-check-label" for="img3">Img3</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="imagem-fundo" id="img4">
                                    <label class="form-check-label" for="img4">Img3</label>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-center bg-light">
                                <button type="button" class="btn btn-primary px-5" data-bs-dismiss="modal">Confirmar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row align-items-end">
            <div class="col-8 col-lg-4 text-end">
                <label for="cor-fundo-cabecalho" class="form-label fw-bold">Cor de fundo do cabeçalho:</label>
            </div>
            <div class="col-4 col-lg-8">
                <input type="color" class="form-control form-control-color" name="cor-fundo-cabecalho" id="cor-fundo-cabecalho" value="<?= isset($_COOKIE["cor-fundo-cabecalho"]) ? $_COOKIE["cor-fundo-cabecalho"] : "#0d6efd" ; ?>">
            </div>
        </div>
        <hr>
        <div class="row align-items-end">
            <div class="col-8 col-lg-4 text-end">
                <label for="cor-fonte-cabecalho" class="form-label fw-bold">Cor da fonte do cabeçalho:</label>
            </div>
            <div class="col-4 col-lg-8">
                <input type="color" class="form-control form-control-color" name="cor-fonte-cabecalho" id="cor-fonte-cabecalho" value="<?= isset($_COOKIE["cor-fonte-cabecalho"]) ? $_COOKIE["cor-fonte-cabecalho"] : "#ffffff" ; ?>">
            </div>
        </div>
        <hr>
        <div class="row align-items-end">
            <div class="col-8 col-lg-4 text-end">
                <label for="cor-fundo-corpo" class="form-label fw-bold">Cor de fundo do corpo:</label>
            </div>
            <div class="col-4 col-lg-8">
                <input type="color" class="form-control form-control-color" name="cor-fundo-corpo" id="cor-fundo-corpo" value="<?= isset($_COOKIE["cor-fundo-corpo"]) ? $_COOKIE["cor-fundo-corpo"] : "#ffffff" ; ?>">
            </div>
        </div>
        <hr>
        <div class="row align-items-end">
            <div class="col-8 col-lg-4 text-end">
                <label for="cor-fonte-corpo" class="form-label fw-bold">Cor da fonte do corpo:</label>
            </div>
            <div class="col-4 col-lg-8">
                <input type="color" class="form-control form-control-color" name="cor-fonte-corpo" id="cor-fonte-corpo" value="<?= isset($_COOKIE["cor-fonte-corpo"]) ? $_COOKIE["cor-fonte-corpo"] : "#212529" ; ?>">
            </div>
        </div>
        <hr>
        <div class="row align-items-end">
            <div class="col-8 col-lg-4 text-end">
                <label for="cor-fundo-rodape" class="form-label fw-bold">Cor de fundo do rodapé:</label>
            </div>
            <div class="col-4 col-lg-8">
                <input type="color" class="form-control form-control-color" name="cor-fundo-rodape" id="cor-fundo-rodape" value="<?= isset($_COOKIE["cor-fundo-rodape"]) ? $_COOKIE["cor-fundo-rodape"] : "#f0f0f0" ; ?>">
            </div>
        </div>
        <hr>
        <div class="row align-items-end">
            <div class="col-8 col-lg-4 text-end">
                <label for="cor-fonte-rodape" class="form-label fw-bold">Cor da fonte do rodapé:</label>
            </div>
            <div class="col-4 col-lg-8">
                <input type="color" class="form-control form-control-color" name="cor-fonte-rodape" id="cor-fonte-rodape" value="<?= isset($_COOKIE["cor-fonte-rodape"]) ? $_COOKIE["cor-fonte-rodape"] : "#6c757d" ; ?>">
            </div>
        </div>
        <hr>
        <div class="row align-items-end">
            <div class="col-8 col-lg-4 text-end">
                <label for="cor-bordas" class="form-label fw-bold">Cor das bordas:</label>
            </div>
            <div class="col-4 col-lg-8">
                <input type="color" class="form-control form-control-color" name="cor-bordas" id="cor-bordas" value="<?= isset($_COOKIE["cor-bordas"]) ? $_COOKIE["cor-bordas"] : "#bcbebf" ; ?>">
            </div>
        </div>
        <hr>
        <div class="text-center mb-3">
            <button type="submit" class="btn btn-primary btn-action me-2">Aplicar</button><a class="btn btn-secondary btn-action ms-2" href="/" role="button">Cancelar</a>
        </div>
    </form>
</section>