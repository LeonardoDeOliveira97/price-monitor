<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <!-- Home -->
                <a class="nav-link" href="<?= base_url('home') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-house"></i></div>
                    Home
                </a>
                <!-- End Home -->

                <!-- Products -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseProducts" aria-expanded="false" aria-controls="collapseProducts">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-boxes-stacked"></i></div>
                    Produtos
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse" id="collapseProducts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="<?= base_url('produtos') ?>">Ver Todos</a>
                        <a class="nav-link" href="<?= base_url('produtos/novo') ?>">Novo Produto</a>
                        <a class="nav-link" href="<?= base_url('produtos/monitorar') ?>">Criar Monitoramento</a>
                    </nav>
                </div>
                <!-- End Products -->

                <!-- Users -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUsers" aria-expanded="false" aria-controls="collapseUsers">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                    Usuários
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse" id="collapseUsers" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="<?= base_url('usuarios') ?>">Ver Todos</a>
                        <a class="nav-link" href="<?= base_url('usuarios/novo') ?>">Novo Usuário</a>
                    </nav>
                </div>
                <!-- End Users -->

            </div>
        </div>
    </nav>
</div>