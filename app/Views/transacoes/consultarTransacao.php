<!DOCTYPE html>
<html lang="pt-BR">

<!--begin::Head-->

<head>
  <title><?= $titulo ?></title><!--begin::Primary Meta Tags-->
  <?= $this->include('template/header') ?>
</head><!--end::Head-->


<!--begin::Body-->

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">

  <!--begin::App Wrapper-->
  <div class="app-wrapper">
    <?= $this->include('template/nav') ?>
    <?= $this->include('template/sidebar') ?>

    <!--begin::App Main-->
    <main class="app-main">

      <!--begin::App Content Header-->
      <div class="app-content-header">

        <!--begin::Container-->
        <div class="container-fluid">

          <!--begin::Row-->
          <?= $this->include('componentes/breadcrumbs') ?>
          <!--end::Row-->

        </div><!--end::Container-->
      </div><!--end::App Content Header-->

      <!--begin::App Content-->
      <div class="app-content">

        <!--begin::Container-->
        <div class="container-fluid">

          <!--begin::Row-->
          <div class="row">
            <div class="col-8">

              <?php if (
                null !== (session()->get('msg'))
                || (session()->get('success'))
                || (session()->get('errors'))
              ): ?>
                <div class="callout callout-info">
                  <?= session()->get('msg') ?>
                  <?= session()->get('success') ?>
                  <?= session()->get('errors') ?>
                </div>
              <?php endif; ?>

              <!-- inicio formulário -->
              <?= $this->include('componentes/transacoes/formulario') ?>
              <!-- Fim do Formulário -->
            </div>
            <div class="col-4">
              <!-- Inicio SideBar do Formulario -->

            </div> <!-- Fim do SideBar do Formulario -->
          </div> <!-- Fim do Row -->
        </div>
        <!-- Fim -->
      </div><!--end::Container-->
  </div><!--end::App Content-->
  </main><!--end::App Main-->
  <?= $this->include('componentes/modals/change_user_img.php') ?>

  <?= $this->include('template/footer') ?>

</body><!--end::Body-->

</html>