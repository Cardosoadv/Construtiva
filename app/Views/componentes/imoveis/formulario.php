<form method="post" id="form_imovel" name="form_imovel" action="<?= site_url('imoveis/salvar') ?>">
    <input type="hidden" name="id" value="<?= $imovel['id'] ?? '' ?>">
    <div class="row mb-3">
        <div class="form-group col">
            <label for="codigo">Código</label>
            <input type="text" class="form-control" name="codigo" id="codigo" value="<?= $imovel['codigo'] ?? '' ?>" required>
        </div>
    </div>
    <div class="row mb-3">
        <div class="form-group col">
            <label for="bairro">Bairro</label>
            <input type="text" class="form-control" name="bairro" id="bairro" value="<?= $imovel['bairro'] ?? '' ?>" required>
        </div>
        <div class="form-group col">
            <label for="quadra">Quadra</label>
            <input type="text" class="form-control" name="quadra" id="quadra" value="<?= $imovel['quadra'] ?? '' ?>">
        </div>
        <div class="form-group col">
            <label for="lote">Lote</label>
            <input type="text" class="form-control" name="lote" id="lote" value="<?= $imovel['lote'] ?? '' ?>">
        </div>

    <div class="form-group">
                <label for="certidao_obito">Escritura</label>
                <input type="hidden" id="escritura" name="escritura" value="<?= $imovel['escritura'] ?? 0 ?>">
                <div class="btn-group w-100" role="group" aria-label="emissaoEscritura">
                    <input type="checkbox" class="btn-check" id="emissao_escritura" name="checkbox" autocomplete="off" <?= (($imovel['escritura']?? 0) == 1) ? 'checked' : '' ?>>
                    <label class="btn w-100" id="situacao" for ="emissao_escritura">
                        <?= (($imovel['escritura']?? 0) == 1) ? 'Emitida' : 'Não Emitida' ?>
                    </label>
                </div>
            </div>

    <div class="mt-3">
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="<?= site_url('/imovies/') ?>" class="btn btn-outline-secondary">Cancelar</a>
    </div>
</form>

<script>
    const checkbox = document.getElementById('emissao_escritura');
    const label = document.getElementById('situacao');
    const value = document.getElementById('escritura');

    function atualizarBotao() {
        if (checkbox.checked) {
            label.textContent = 'Emitida';
            label.classList.remove('btn-outline-danger');
            label.classList.add('btn-outline-success');
            value.value = 1;

        } else {
            label.textContent = 'Não Emitida';
            label.classList.remove('btn-outline-success');
            label.classList.add('btn-outline-danger');
            value.value = 0;
        }
    }

    checkbox.addEventListener('change', atualizarBotao);

    // Chama a função inicialmente para definir o estado correto ao carregar a página
    atualizarBotao();
</script>