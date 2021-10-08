<h1 class="mb-3">Pronto</h1>
<section class="mb-3">
    <div>O arquivo PDF foi gerado com sucesso!</div>
    <div>O que deseja fazer com ele?</div>
    <div class="mt-3">
        <a href="temp/noticia.pdf" target="_blank" role="button" class="text-dark"><svg class="icon">
            <use xlink:href="img/icons.svg#icon-download"></use>
        </svg>Baixar</a>
    </div>
    <div class="mt-3">
        <a href="#" role="button" class="text-dark" data-bs-toggle="modal" data-bs-target="#EnviarParaContato"><svg class="icon">
            <use xlink:href="img/icons.svg#icon-contacts"></use>
        </svg>Enviar para um contato</a> <span>(matrícula/nome)</span>
    </div>
    <div class="mt-3">
        <a href="#" role="button" class="text-dark" data-bs-toggle="modal" data-bs-target="#EnviarPorEmail"><svg class="icon">
            <use xlink:href="img/icons.svg#icon-mail"></use>
        </svg>Enviar por email</a>
    </div>
    <div class="mt-3">
        <a href="javascript:history.back()" role="button" class="text-dark"><svg class="icon">
            <use xlink:href="img/icons.svg#icon-back"></use>
        </svg>Voltar</a>
    </div>
</section>
<div class="alert alert-danger mb-0" role="alert">
    <strong>Nota Técnica</strong>
    <ul class="my-3">
        <li>A geração pelo servidor dos arquivos em formato PDF se mostrou inviável para este tipo de aplicação, visto que o componente utilizado <a href="https://github.com/dompdf/dompdf" class="text-danger" target="_blank">(dompdf/dompdf)</a>, apesar de ser a opção mais baixada no repositório <a href="https://packagist.org/" class="text-danger" target="_blank">https://packagist.org/</a>, apresentou problemas na renderização de imagens e fontes.</li>
        <li>Considerando que este projeto oferece uma ampla gama de opções de customização do conteúdo, torna-se inviável escrever uma funcionalidade que consiga tratar todos os possíveis casos de erro.</li>
        <li>Um cenário mais adequado para este tipo de implementação utilizando apenas PHP é o da geração de documentos padronizados (faturas, relatórios, pareceres, etc.), que podem ter seu layout previamente validado.</li>
    </ul>
    <p class="mb-0"><strong>Obs.:</strong> Existem alternativas em JavaScript/Node que utilizam o recurso Headless Chrome para renderização, possibilitando resultados mais fiéis.</p>
</div>
<div class="modal fade" id="EnviarParaContato" tabindex="-1" aria-labelledby="EnviarParaContatoLabel" aria-hidden="true">
    <form method="POST" action="/enviar-email">
        <input type="hidden" name="noticia-id" value="<?= $noticia->getId(); ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title" id="EnviarParaContatoLabel">Atenção!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="destinatario" class="form-label mt-3">Matrícula/Nome do Destinatário</label>
                    <select class="form-select mb-3" name="destinatario" id="destinatario" required>
                        <option selected></option>
                        <?php if ($contatos): ?>
                        <?php foreach ($contatos as $contato): ?>
                        <option value="<?= $contato["email"]; ?>"><?= $contato["matricula"]; ?> - <?= $contato["nome"]; ?></option>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="modal-footer justify-content-center bg-light">
                    <button type="submit" class="btn btn-primary px-5 me-2" >Enviar</button>
                    <button type="button" class="btn btn-secondary ms-2" data-bs-dismiss="modal" style="width: 8.75rem">Cancelar</button>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="modal fade" id="EnviarPorEmail" tabindex="-1" aria-labelledby="EnviarPorEmailLabel" aria-hidden="true">
    <form method="POST" action="/enviar-email">
        <input type="hidden" name="noticia-id" value="<?= $noticia->getId(); ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title" id="EnviarPorEmailLabel">Atenção!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="destinatario" class="form-label mt-3">Email do destinatário</label>
                    <input class="form-control mb-3" type="destinatario" name="destinatario" id="destinatario" placeholder="nome@dominio.com.br" required>
                </div>
                <div class="modal-footer justify-content-center bg-light">
                    <button type="submit" class="btn btn-primary px-5 me-2" >Enviar</button>
                    <button type="button" class="btn btn-secondary ms-2" data-bs-dismiss="modal" style="width: 8.75rem">Cancelar</button>
                </div>
            </div>
        </div>
    </form>
</div>