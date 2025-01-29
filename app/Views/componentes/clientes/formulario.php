<form method="post" id="form_cliente" name="form_cliente" action="<?= site_url('clientes/salvar') ?>">
    <input type="hidden" name="id" value="<?= $cliente['id'] ?? '' ?>">

    <div class="row mb-3">
        <div class="form-group col">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="cliente" id="cliente" value="<?= $cliente['cliente'] ?? '' ?>" required>
        </div>
    </div>

    <div class="row mb-3">
        <div class="form-group col">
            <label for="profissao">Profissão</label>
            <input type="text" class="form-control" name="profissao" id="profissao" value="<?= $cliente['profissao'] ?? '' ?>">
        </div>
        <div class="form-group col">
            <label for="estado_civil">Estado Civil</label>
            <select class="form-control" name="estado_civil" id="estado_civil">
                <option value="Solteiro" <?= ($cliente['estado_civil']??'Solteiro') == 'Solteiro' ? 'selected' : '' ?>>Solteiro</option>
                <option value="Casado" <?= ($cliente['estado_civil']??'') == 'Casado' ? 'selected' : '' ?>>Casado</option>
                <option value="Divorciado" <?= ($cliente['estado_civil']??'') == 'Divorciado' ? 'selected' : '' ?>>Divorciado</option>
                <option value="Viúvo" <?= ($cliente['estado_civil']??'') == 'Viúvo' ? 'selected' : '' ?>>Viúvo</option>
                <option value="União Estável" <?= ($cliente['estado_civil']??'') == 'União Estável' ? 'selected' : '' ?>>União Estável</option>
            </select>
        </div>
    </div>
    <div class="row mb-3">
        <div class="form-group col">
            <label for="conjuge">Conjuge</label>
            <input type="text" class="form-control" name="conjuge" id="conjuge" value="<?= $cliente['conjuge'] ?? '' ?>">
        </div>
    </div>

    <div class="row mb-3">
        
        <div class="form-group col">
            <label for="data_nasc">Data de Nascimento</label>
            <input type="date" class="form-control" name="data_nasc" id="data_nasc" value="<?= $cliente['data_nasc'] ?? '' ?>">
        </div>
        <div class="form-group col">
            <label for="cpf">CPF</label>
            <input type="text" class="form-control" name="cpf" id="cpf" value="<?= $cliente['cpf'] ?? '' ?>">
        </div>
        <div class="form-group col">
            <label for="ci">Identidade</label>
            <input type="text" class="form-control" name="ci" id="ci" value="<?= $cliente['ci'] ?? '' ?>">
        </div>
    </div>

    <div class="row mb-3">

        <div class="form-group col-8">
            <label for="rua">Rua</label>
            <input type="text" class="form-control" name="rua" id="rua" value="<?= $cliente['rua'] ?? '' ?>">
        </div>

        <div class="form-group col-2">
            <label for="numero_endereco">Número</label>
            <input type="text" class="form-control" name="numero_endereco" id="numero_endereco" value="<?= $cliente['numero_endereco'] ?? '' ?>">
        </div>

        <div class="form-group col-2">
            <label for="complemento">Complemento</label>
            <input type="text" class="form-control" name="complemento" id="complemento" value="<?= $cliente['complemento'] ?? '' ?>">
        </div>
    </div>

    <div class="row mb-3">
        <div class="form-group col">
            <label for="bairro">Bairro</label>
            <input type="text" class="form-control" name="bairro" id="bairro" value="<?= $cliente['bairro'] ?? '' ?>">
        </div>
        <div class="form-group col">
            <label for="cidade">Cidade</label>
            <input type="text" class="form-control" name="cidade" id="cidade" value="<?= $cliente['cidade'] ?? '' ?>">
        </div>
        <div class="form-group col">
            <label for="ufs">UF</label>
            <input class="form-control" list="ufs" name="uf" id="ufs" value="<?= $cliente['uf'] ?? '' ?>" maxlength="2">
            <datalist id="ufs">
                <option value="AC">Acre</option>
                <option value="AL">Alagoas</option>
                <option value="AP">Amapá</option>
                <option value="AM">Amazonas</option>
                <option value="BA">Bahia</option>
                <option value="CE">Ceará</option>
                <option value="DF">Distrito Federal</option>
                <option value="ES">Espírito Santo</option>
                <option value="GO">Goiás</option>
                <option value="MA">Maranhão</option>
                <option value="MT">Mato Grosso</option>
                <option value="MS">Mato Grosso do Sul</option>
                <option value="MG">Minas Gerais</option>
                <option value="PA">Pará</option>
                <option value="PB">Paraíba</option>
                <option value="PR">Paraná</option>
                <option value="PE">Pernambuco</option>
                <option value="PI">Piauí</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="RN">Rio Grande do Norte</option>
                <option value="RS">Rio Grande do Sul</option>
                <option value="RO">Rondônia</option>
                <option value="RR">Roraima</option>
                <option value="SC">Santa Catarina</option>
                <option value="SP">São Paulo</option>
                <option value="SE">Sergipe</option>
                <option value="TO">Tocantins</option>
            </datalist>
        </div>
        <div class="form-group col">
            <label for="cep">CEP</label>
            <input type="text" class="form-control" name="cep" id="cep" value="<?= $cliente['cep'] ?? '' ?>">
        </div>
    </div>

    <div class="row mb-3">
        <div class="form-group col">
            <label for="clausula_escr">Cláusula Escritura</label>
            <input type="text" class="form-control" name="clausula_escr" id="clausula_escr" value="<?= $cliente['clausula_escr'] ?? '' ?>">
        </div>
    </div>

    <div class="form-group">
                <label for="certidao_obito">Certidão de Obito</label>
                <input type="hidden" id="certidao_obito" name="certidao_obito" value="<?= $cliente['certidao_obito'] ?? 0 ?>">
                <div class="btn-group w-100" role="group" aria-label="falecido">
                    <input type="checkbox" class="btn-check" id="falecido" name="checkbox" autocomplete="off" <?= (($cliente['certidao_obito']?? 0) == 1) ? 'checked' : '' ?>>
                    <label class="btn w-100" id="falecido_label" for="falecido">
                        <?= (($cliente['certidao_obito']?? 0) == 1) ? 'Falecido' : 'Ativo' ?>
                    </label>
                </div>
            </div>

    <div class="mt-3">
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="<?= site_url('/clientes/') ?>" class="btn btn-outline-secondary">Cancelar</a>
    </div>
</form>

<script>
    const checkbox = document.getElementById('falecido');
    const label = document.getElementById('falecido_label');
    const value = document.getElementById('certidao_obito');

    function atualizarBotao() {
        if (checkbox.checked) {
            label.textContent = 'Falecido';
            label.classList.remove('btn-outline-success');
            label.classList.add('btn-outline-danger');
            value.value = 1;

        } else {
            label.textContent = 'Ativo';
            label.classList.remove('btn-outline-danger');
            label.classList.add('btn-outline-success');
            value.value = 0;
        }
    }

    checkbox.addEventListener('change', atualizarBotao);

    // Chama a função inicialmente para definir o estado correto ao carregar a página
    atualizarBotao();
</script>