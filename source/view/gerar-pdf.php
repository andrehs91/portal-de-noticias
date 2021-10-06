<h1 class="mb-3">Pronto</h1>
<section class="mb-3">
    <div>O arquivo PDF foi gerado com sucesso!</div>
    <div>O que deseja fazer com ele?</div>
    <div class="mt-3">
        <a href="temp/noticia.pdf" role="button" class="text-dark"><svg class="icon">
            <use xlink:href="img/icons.svg#icon-download"></use>
        </svg>Baixar</a>
    </div>
    <div class="mt-3">
        <a href="#" role="button" class="text-dark"><svg class="icon">
            <use xlink:href="img/icons.svg#icon-contacts"></use>
        </svg>Enviar para um contato</a>
    </div>
    <div class="mt-3">
        <a href="#" role="button" class="text-dark"><svg class="icon">
            <use xlink:href="img/icons.svg#icon-mail"></use>
        </svg>Enviar por email</a>
    </div>
    <div class="mt-3">
        <a href="/" role="button" class="text-dark"><svg class="icon">
            <use xlink:href="img/icons.svg#icon-back"></use>
        </svg>Voltar</a>
    </div>
</section>
<div class="alert alert-danger" role="alert">
    <strong>Nota Técnica:</strong><br>
    &nbsp; &nbsp; A geração dos arquivos em formato PDF pelo servidor se mostrou inviável para este tipo de aplicação, visto que o componente utilizado <a href="https://github.com/dompdf/dompdf" class="text-danger" target="_blank">(dompdf/dompdf)</a>, apesar de ser a opção mais baixada no repositório <a href="https://packagist.org/" class="text-danger" target="_blank">https://packagist.org/</a>, apresentou problemas na renderização de imagens e fontes.<br>
    &nbsp; &nbsp; Um cenário mais adequado para este tipo de implementação é o da geração de documentos padronizados (faturas, relatórios, pareceres, etc.), que podem ter seu layout previamente validado.<br>
    &nbsp; &nbsp; Neste caso, em que o conteúdo pode ser amplamente customizado, acredito que a geração do arquivo deva ser feita diretamente pelo usuário na opção de Impressão > Salvar como PDF (disponível na maioria dos dispositivos desktop/mobile modernos), para que o resultado visual seja mais fiel ao observado no site.
</div>