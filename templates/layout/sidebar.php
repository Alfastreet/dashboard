<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
        <svg class="sidebar-brand-full" width="118" height="46" alt="Alfastreet Logo UI">
            <use xlink:href="assets/brand/coreui.svg#full"></use>
        </svg>
        <svg class="sidebar-brand-narrow" width="46" height="46" alt="Alfastreet Logo UI">
            <use xlink:href="assets/brand/coreui.svg#signet"></use>
        </svg>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
        <li class="nav-item"><a class="nav-link" href="/">
                <svg class="nav-icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
                </svg>Inicio</a></li>
        <!-- Contenido Borrado -->
        <!-- // -->
        <li class="nav-title">Components</li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                <svg class="nav-icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
                </svg>Base</a>
            <ul class="nav-group-items">
                <li class="nav-item"><?= $this->Html->link('Contadores', ['controller' => 'Accountants', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
            </ul>
        </li>
       
    </ul>
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>


<!-- <a class="nav-link" href="/"><span class="nav-icon"></span>
                        Accordion</a> -->