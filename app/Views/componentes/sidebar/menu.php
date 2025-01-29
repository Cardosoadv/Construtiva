<?php
$uri = service('uri');
$active = $uri->getSegment(1);
?>

<ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
    <li class="nav-item">
        <a href="<?= site_url(); ?>" class="nav-link <?= ($active === null) ? 'active' : ''; ?>">
            <i class="nav-icon bi bi-speedometer"></i>
            <p>Home</p>
        </a>
    </li>

    <li class="nav-item <?= ($active === 'clientes') ? 'active' : ''; ?>">
        <a href="<?= site_url('clientes'); ?>" class="nav-link">
            <i class="nav-icon bi bi-person-gear"></i>
            <p>Clientes</p>
        </a>
    </li>

    <li class="nav-item <?= ($active === 'imoveis') ? 'active' : ''; ?>">
        <a href="<?= site_url('imoveis'); ?>" class="nav-link">
            <i class="nav-icon bi bi-bank"></i>
            <p>Imoveis</p>
        </a>
    </li>

    <li class="nav-item <?= ($active === 'transacoes') ? 'active' : ''; ?>">
        <a href="<?= site_url('transacoes'); ?>" class="nav-link">
            <i class="nav-icon bi bi-arrow-left-right"></i>
            <p>Transacoes</p>
        </a>
    </li>
</ul>