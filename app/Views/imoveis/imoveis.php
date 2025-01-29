<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title><?= $titulo ?></title>
    <?= $this->include('template/header') ?>
</head>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
        <?= $this->include('template/nav') ?>
        <?= $this->include('template/sidebar') ?>
        <main class="app-main">
            <div class="app-content-header">
                <div class="container-fluid">
                    <?= $this->include('componentes/breadcrumbs') ?>
                </div>
            </div>
            <div class="app-content">
                <div class="container-fluid">
                    <!-- Main Content Column -->
                    <div class="col-lg-9">
                        <!-- Search Form -->
                        <form action="" method="get" class="mb-3">
                            <div class="input-group">
                                <input
                                    type="text"
                                    name="s"
                                    class="form-control"
                                    placeholder="Pesquisar..."
                                    aria-label="Pesquisar">
                                <button class="btn btn-outline-secondary" type="submit">
                                    Pesquisar
                                </button>
                            </div>
                        </form>
                        <!-- Action Button and Messages -->
                        <div class="container">
                            <div class="d-flex justify-content-end mb-3">
                                <a href="<?= base_url('imoveis/novo/') ?>"
                                    class="btn btn-success">
                                    Novo Imóvel
                                </a>
                            </div>
                            <?php if (session()->get('msg')): ?>
                                <div class="callout callout-info">
                                    <?= session()->get('msg') ?>
                                </div>
                            <?php endif; ?>
                            <!-- Data Table -->
                            <div class="mt-3">
                                <?php if (empty($imoveis)): ?>
                                    <div class="alert alert-info">
                                        Nenhum imóvel encontrado.
                                    </div>
                                <?php else: ?>
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Código</th>
                                                <th>Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($imoveis as $imovel): ?>
                                                <tr>
                                                    <td><?= esc($imovel['codigo']) ?></td>
                                                    <td>
                                                        <a href="<?= base_url('imoveis/editar/' . $imovel['id']) ?>"
                                                            class="btn btn-sm btn-primary">
                                                            Editar
                                                        </a>
                                                        <a href="<?= base_url('imoveis/excluir/' . $imovel['id']) ?>"
                                                            class="btn btn-sm btn-danger">
                                                            Excluir
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <?= $pager->links() ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?= $this->include('componentes/modals/change_user_img.php') ?>
        <?= $this->include('template/footer') ?>
    </div>
</body>

</html>