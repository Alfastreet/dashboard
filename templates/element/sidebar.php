<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
        <svg class="sidebar-brand-full" width="118" height="46" alt="Alfastreet Logo UI">
            <use xlink:href="/assets/brand/coreui.svg#full"></use>
        </svg>
        <svg class="sidebar-brand-narrow" width="46" height="46" alt="Alfastreet Logo UI">
            <use xlink:href="/assets/brand/coreui.svg#signet"></use>
        </svg>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
        <li class="nav-item">
            <a class="nav-link" href="/">
                <svg class="nav-icon">
                    <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-home"></use>
                </svg><?= __('Inicio') ?>
            </a>
        </li>
        <!-- Submenus -->
        <li class="nav-title"><?= __('Contabilidad') ?></li>
        <!-- Submenus de navegacion -->
        <li class="nav-group">
            <a class="nav-link nav-group-toggle" href="#">
                <svg class="nav-icon">
                    <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-money"></use>
                </svg><?= __('Participaciones') ?>
            </a>
            <ul class="nav-group-items">
                <li class="nav-item">
                    <?= $this->Html->link('Informe General', ['controller' => 'Accountants', 'action' => 'general'], ['class' => 'nav-link']) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('Nueva Participacion', ['controller' => 'Accountants', 'action' => 'add'], ['class' => 'nav-link']) ?>
                </li>
            </ul>
        </li>
        <!-- Fin Submenus de navegacion -->
        <!-- Submenus de navegacion -->
        <li class="nav-group">
            <a class="nav-link nav-group-toggle" href="#">
                <svg class="nav-icon">
                    <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-description"></use>
                </svg><?= __('Cotizaciones Y Ordenes') ?>
            </a>
            <ul class="nav-group-items">
                <li class="nav-item">
                    <?= $this->Html->link('Ver Cotizaciones', ['controller' => 'Quotes', 'action' => 'index'], ['class' => 'nav-link']) ?>
                </li>
                <?php if ($isAdmin || $isTecBoss) : ?>
                    <li class="nav-item">
                        <?= $this->Html->link('Ordenes de Salida', ['controller' => 'installments', 'action' => 'index'], ['class' => 'nav-link']) ?>
                    </li>
                    <li class="nav-item">
                        <?= $this->Html->link('Ordenes de Trabajo', ['controller' => 'orders', 'action' => 'index'], ['class' => 'nav-link']) ?>
                    </li>
                <?php endif; ?>
            </ul>
        </li>
        <!-- Fin Submenus de navegacion -->
        <!-- Submenus de navegacion -->
        <li class="nav-group">
            <a class="nav-link nav-group-toggle" href="#">
                <svg class="nav-icon">
                    <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-wallet"></use>
                </svg><?= __('Cartera') ?>
            </a>
            <ul class="nav-group-items">
                <li class="nav-item">
                    <?= $this->Html->link('Ver Consolidado General', ['controller' => 'Wallets', 'action' => 'index'], ['class' => 'nav-link']) ?>
                </li>
                <li class="nav-items">
                    <?= $this->Html->link('Acuerdos Comerciales', ['controller' => 'Agreements', 'action' => 'index'], ['class' => 'nav-link']) ?>
                </li>
            </ul>
        </li>
        <!-- Fin Submenus de navegacion -->
        <!-- Submenus -->
        <li class="nav-title"><?= __('Administracion') ?></li>
        <!-- Submenus de navegacion -->
        <li class="nav-group">
            <a href="#" class="nav-link nav-group-toggle">
                <svg class="nav-icon">
                    <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-building"></use>
                </svg>Empresas
            </a>
            <ul class="nav-group-items">
                <li class="nav-items"><?= $this->Html->link('Ver todas las empresas', ['controller' => 'Business', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
                <?php if ($user_init->rol_id === 1 || $user_init->rol_id === 2) : ?>
                    <li class="nav-items"><?= $this->Html->link('Registrar Empresa', ['controller' => 'Business', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
                <?php endif ?>
            </ul>
        </li>
        <!-- Fin Submenus de navegacion -->
        <li class="nav-group">
            <a href="#" class="nav-link nav-group-toggle">
                <svg class="nav-icon">
                    <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-people"></use>
                </svg><?= __('Clientes') ?>
            </a>
            <ul class="nav-group-items">
                <li class="nav-items"><?= $this->Html->link('Ver todos los Clientes', ['controller' => 'Client', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
                <?php if ($user_init->rol_id === 1) : ?>
                    <li class="nav-items"><?= $this->Html->link('Registrar Cliente', ['controller' => 'Client', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
                <?php endif ?>
            </ul>
        </li>
        <!-- Fin Submenus de navegacion -->
        <!-- Fin Submenus de navegacion -->
        <li class="nav-group">
            <a href="#" class="nav-link nav-group-toggle">
                <svg class="nav-icon">
                    <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-casino"></use>
                </svg><?= __('Casinos') ?>
            </a>
            <ul class="nav-group-items">
                <li class="nav-items"><?= $this->Html->link('Ver todos los Casinos', ['controller' => 'Casinos', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
                <?php if ($user_init->rol_id === 1 || $user_init->rol_id === 2) : ?>
                    <li class="nav-items"><?= $this->Html->link('Registrar Casino', ['controller' => 'Casinos', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
                <?php endif ?>
            </ul>
        </li>
        <!-- Fin Submenus de navegacion -->
        <!-- Fin Submenus de navegacion -->
        <li class="nav-group">
            <a href="#" class="nav-link nav-group-toggle">
                <svg class="nav-icon">
                    <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-casino"></use>
                </svg>Maquinas
            </a>
            <ul class="nav-group-items">
                <li class="nav-items"><?= $this->Html->link('Ver todas las maquinas', ['controller' => 'Machines', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
                <li class="nav-items"><?= $this->Html->link('Añadir Maquina', ['controller' => 'Machines', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
            </ul>
        </li>
        <!-- Fin Submenus de navegacion -->

        <!-- Fin Submenus de navegacion -->
        <li class="nav-group">
            <a href="#" class="nav-link nav-group-toggle">
                <svg class="nav-icon">
                    <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-info"></use>
                </svg><?= __('Mesa de Ayuda') ?>
            </a>
            <ul class="nav-group-items">
                <li class="nav-items"><?= $this->Html->link('Todos los Tickets', ['controller' => 'Tikets', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
                <li class="nav-items"><?= $this->Html->link('Tickets Pendientes', ['controller' => 'Tikets', 'action' => 'pending'], ['class' => 'nav-link']) ?></li>
            </ul>
        </li>
        <!-- Fin Submenus de navegacion -->
        <!-- Submenus -->
        <li class="nav-title"><?= __('Inventarios') ?></li>
        <!-- Submenus de navegacion -->
        <li class="nav-group">
            <a class="nav-link nav-group-toggle" href="#">
                <svg class="nav-icon">
                    <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-cart"></use>
                </svg><?= __('Piezas y Servicios') ?>
            </a>
            <ul class="nav-group-items">
                <li class="nav-item">
                    <?= $this->Html->link('Ver Inventario', ['controller' => 'Parts', 'action' => 'index'], ['class' => 'nav-link']) ?>
                </li>
            </ul>
        </li>

        <!-- Submenus -->
        <li class="nav-title"><?= __('Administración General') ?></li>
        <?php if ($isAdmin) : ?>
            <!-- Submenus de navegacion -->
            <li class="nav-group">
                <a class="nav-link nav-group-toggle" href="#">
                    <svg class="nav-icon">
                        <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                    </svg><?= __('Usuarios') ?>
                </a>
                <ul class="nav-group-items">
                    <li class="nav-item">
                        <?= $this->Html->link('Ver Todos los Usuarios', ['controller' => 'Users', 'action' => 'index'], ['class' => 'nav-link']) ?>
                    </li>
                    <li class="nav-item">
                        <?= $this->Html->link('Añadir Nuevo Usuario', ['controller' => 'Users', 'action' => 'add'], ['class' => 'nav-link']) ?>
                    </li>
                </ul>
            </li>
            <!-- Fin Submenus de navegacion -->

            <!-- Submenus de navegacion -->
            <li class="nav-group">
                <a class="nav-link nav-group-toggle" href="#">
                    <svg class="nav-icon">
                        <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-router"></use>
                    </svg><?= __('Modelo de maquinas') ?>
                </a>
                <ul class="nav-group-items">
                    <li class="nav-item">
                        <?= $this->Html->link('Ver Todos los Modelos', ['controller' => 'Model', 'action' => 'index'], ['class' => 'nav-link']) ?>
                    </li>
                    <li class="nav-item">
                        <?= $this->Html->link('Añadir Nuevo Modelo', ['controller' => 'Model', 'action' => 'add'], ['class' => 'nav-link']) ?>
                    </li>
                </ul>
            </li>
            <!-- Fin Submenus de navegacion -->

            <!-- Submenus de navegacion -->
            <li class="nav-group">
                <a class="nav-link nav-group-toggle" href="#">
                    <svg class="nav-icon">
                        <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-external-link"></use>
                    </svg><?= __('Enlaces Generales') ?>
                </a>
                <ul class="nav-group-items">
                    <li class="nav-item">
                        <?= $this->Html->link('Ver Enlaces', ['controller' => 'Links', 'action' => 'index'], ['class' => 'nav-link']) ?>
                    </li>
                    <li class="nav-item">
                        <?= $this->Html->link('Añadir Nuevo Enlace', ['controller' => 'Links', 'action' => 'add'], ['class' => 'nav-link']) ?>
                    </li>
                </ul>
            </li>
            <!-- Fin Submenus de navegacion -->
        <?php endif ?>
    </ul>
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>