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
<div class="row g-0">
    <section class="col-12 col-sm-8 col-lg-9">
    <?php if (isset($noticias)): ?>
        <div class="row g-0">
            <?php foreach ($noticias as $noticia): ?>
            <div class="col-2 col-lg-1 timeline">
                <div class="alert alert-dark text-center p-0">
                    <?= $noticia->getDiaCriacao('d/m'); ?>
                </div>
            </div>
            <div class="col-10 col-lg-11 ps-3 pb-3">
                <article class="card">
                    <div class="card-header text-center text-white">
                        <a class="card-title link-light text-decoration-none" href="/ler-noticia?noticia-id=<?= $noticia->getId(); ?>"><h1 class="h4 mb-0"><?= $noticia->getTitulo(); ?></h1></a>
                    </div>
                    <div class="card-body">
                        <div class="card-body-content">
                            <?= $noticia->getConteudo(); ?>
                        </div>
                        <div class="text-center mt-2">
                            <a href="/ler-noticia?noticia-id=<?= $noticia->getId(); ?>">Continuar lendo</a>
                        </div>
                    </div>
                </article>
            </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="alert alert-primary" role="alert">Nenhuma notícia foi encontrada.</div>
    <?php endif; ?>
    </section>
    <section class="col-12 col-sm-4 col-lg-3 mt-3 mt-sm-0 ps-0 ps-sm-3">
        <div class="alert alert-secondary">
            <h2 class="h3">Sobre o Projeto</h2>
            <p>Este portal de notícias foi desenvolvido conforme especificado na etapa de <u>Produção Temática</u> do <u>PSI 12017</u> para a vaga de Assistente Júnior demandado pela <u>unidade 5263</u>. (GEHAB - GN Rede Executiva Habitação).</p>
            <p class="mb-0">Além da leitura, escrita, edição e exclusão de uma notícia, ele contém as seguintes funcionalidades:</p>
            <ul>
                <li>Alteração do tema das notícias (cores de fundo e fonte)</li>
                <li>Geração das notícias em PDF</li>
                <li>Envio do PDF para contatos pré-cadastrados</li>
                <li>Envio do PDF por e-mail</li>
            </ul>
            <h2 class="h3">Sobre o Autor</h2>
            <p>Meu nome é <u>André Henrique</u>, sou formado em <u>Administração</u> pela UEPG (Universidade Estadual de Ponta Grossa) e pós-graduado em <u>MBA em Engenharia de Software</u> pela UTFPR (Universidade Tecnológica Federal do Paraná)</p>
            <p>Atualmente, estou lotado na Agência Telêmaco Borba, no Paraná, e tenho buscado oportunidades nas áreas de tecnologia da CAIXA.</p>
            <p>
                <a href="https://github.com/andrehs91" target="_blank" class="text-dark"><svg class="icon me-2"><use xlink:href="img/icons.svg#icon-github"></use></svg>Perfil do GitHub</a>
            </p>
            <p>
                <a href="https://www.linkedin.com/in/andre-henrique-dos-santos/" target="_blank" class="text-dark"><svg class="icon me-2"><use xlink:href="img/icons.svg#icon-linkedin"></use></svg>Perfil do LinkedIn</a>
            </p>
        </div>
    </section>
</div>