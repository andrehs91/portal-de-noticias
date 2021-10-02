<script>
    tinymce.init({
        selector: '#news-content',
        height : 480,
        min_height: 240,
        plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
        menubar: 'file edit view insert format tools table help',
        toolbar: 'undo redo | formatselect fontsizeselect | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | charmap emoticons | fullscreen preview save | insertfile image media link codesample',
        toolbar_sticky: true,
        autosave_ask_before_unload: true,
        autosave_interval: '30s',
        autosave_prefix: '{path}{query}-{id}-',
        autosave_restore_when_empty: false,
        autosave_retention: '2m',
        image_advtab: true,
        quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
        noneditable_noneditable_class: 'mceNonEditable',
        toolbar_mode: 'sliding',
        contextmenu: 'link image imagetools table'
    });
</script>
<h1 class="mb-3">Escrever Notícia</h1>
<section>
    <form method="POST">
        <input type="hidden" name="news-date" value=<?= date('Y-m-d'); ?>>
        <input type="hidden" name="news-time" value=<?= date('H:i'); ?>>
        <div class="my-3">
            <label for="news-title" class="form-label fw-bold">Título:</label>
            <input type="text" class="form-control" name="news-title" id="news-title" maxlength="120" required>
        </div>
        <div class="mb-3">
            <label for="news-content" class="form-label fw-bold">Conteúdo: </label>
            <textarea name="news-content" id="news-content" placeholder="..."></textarea>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary px-5">Publicar</button>
        </div>
    </form>
</section>