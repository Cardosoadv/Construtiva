<?php
$imoveis = model('ImovelModel')->findAll();
$clientes = model('ClienteModel')->findAll();
?>


<form method="post" id="form_transacao" name="form_transacao" action="<?= site_url('transacoes/salvar') ?>">
    <input type="hidden" name="id" value="<?= $transacao['id'] ?? '' ?>">

    <div class="row mb-3">
        <div class="form-group col">
            <label for="tipo">Tipo de Transação</label>
            <select class="form-control" name="tipo" id="tipo" required>
                <option value="Venda" <?= ($transacao['tipo'] ?? 'Venda') == 'Venda' ? 'selected' : '' ?>>Venda</option>
                <option value="Transferencia" <?= ($transacao['tipo'] ?? '') == 'Transferencia' ? 'selected' : '' ?>>Transferência</option>
                <option value="Troca" <?= ($transacao['tipo'] ?? '') == 'Troca' ? 'selected' : '' ?>>Troca</option>
                <option value="Devolução" <?= ($transacao['tipo'] ?? '') == 'Devolução' ? 'selected' : '' ?>>Devolução</option>
            </select>
        </div>
        <div class="form-group col">
            <label for="imovel">Imovel</label>
            <select class="form-control" name="imovel" id="imovel" required>
                <?php foreach ($imoveis as $imovel): ?>
                    <option value="<?= $imovel['id'] ?>" <?= ($transacao['imovel'] ?? '') == $imovel['id'] ? 'selected' : '' ?>><?= $imovel['codigo'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>


    </div>

    <div class="row mb-3">

    <div id="clientes-container">
    <?php if (!empty($transacao['cliente'])): ?>
        <?php foreach ($transacao['cliente'] as $clienteTransacao): ?>
            <div class="row mb-3 cliente-row">
                <div class="form-group col">
                    <label for="cliente_<?= $clienteTransacao ?>">Cliente</label>
                    <select class="form-control" name="cliente[]" id="cliente_<?= $clienteTransacao ?>" required>
                        <?php foreach ($clientes as $cliente): ?>
                            <option value="<?= $cliente['id'] ?>" <?= ($clienteTransacao == $cliente['id']) ? 'selected' : '' ?>>
                                <?= $cliente['cliente'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="row mb-3 cliente-row">
            <div class="form-group col">
                <label for="cliente_1">Cliente</label>
                <select class="form-control" name="cliente[]" id="cliente_1" required>
                    <option value="">Selecione um cliente</option>
                    <?php foreach ($clientes as $cliente): ?>
                        <option value="<?= $cliente['id'] ?>"><?= $cliente['cliente'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    <?php endif; ?>
</div>

<!-- Botão para adicionar mais clientes -->
<div class="row mb-3">
    <div class="col">
        <button type="button" class="btn btn-secondary" id="adicionar-cliente">Adicionar Cliente</button>
    </div>
</div>


    </div>

    <div class="row mb-3">
        <div class="form-group col">
            <label for="num_parcelas">Número de Parcelas</label>
            <input type="number" class="form-control" name="num_parcelas" id="num_parcelas" value="<?= $transacao['num_parcelas'] ?? '' ?>">
        </div>
        <div class="form-group col">
            <label for="num_parcelas_pagas">Número de Parcelas Pagas</label>
            <input type="number" class="form-control" name="num_parcelas_pagas" id="num_parcelas_pagas" value="<?= $transacao['num_parcelas_pagas'] ?? '' ?>">
        </div>
    </div>

    <div class="row mb-3">

        <div class="form-group col">
            <label for="data">Data da Transação</label>
            <input type="date" class="form-control" name="data" id="data" value="<?= $transacao['data'] ?? '' ?>">
        </div>

        <div class="form-group col">
            <label for="dt_minuta">Data da Minuta</label>
            <input type="date" class="form-control" name="dt_minuta" id="dt_minuta" value="<?= $transacao['dt_minuta'] ?? '' ?>">
        </div>
    </div>

    <div class="mt-3">
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="<?= site_url('/transacoes/') ?>" class="btn btn-outline-secondary">Cancelar</a>
    </div>
</form>

<script>
    // Função para adicionar um novo campo de cliente em uma nova linha
    document.getElementById('adicionar-cliente').addEventListener('click', function() {
        const container = document.getElementById('clientes-container');
        const clienteFields = container.querySelectorAll('.cliente-row');
        const newIndex = clienteFields.length + 1;

        const newField = `
            <div class="row mb-3 cliente-row">
                <div class="form-group col">
                    <label for="cliente_${newIndex}">Cliente</label>
                    <select class="form-control" name="cliente[]" id="cliente_${newIndex}" required>
                        <option value="">Selecione um cliente</option>
                        <?php foreach ($clientes as $cliente): ?>
                            <option value="<?= $cliente['id'] ?>"><?= $cliente['cliente'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        `;

        container.insertAdjacentHTML('beforeend', newField);
    });
</script>