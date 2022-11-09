<style>
    .reloj {
        font-size: 1rem;
        font-weight: bold;
        letter-spacing: .3rem;
        text-align: center;
    }
</style>
<header class="header header-sticky mb-4">
    <div class="container-fluid">
        <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
            <svg class="icon icon-lg">
                <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
            </svg>
        </button>
        <a class="header-brand d-none" href="#">
            <svg width="118" height="46" alt="CoreUI Logo">
                <use xlink:href="/assets/brand/coreui.svg#full"></use>
            </svg>
        </a>

        <div class="col d-none d-md-block" id="trm"></div>

        <div class="col text-center">
            <!-- Cuando la página carga (onload), llamamos al método cargarReloj() de JavaScript -->
            <div id="relojnumerico" class="reloj" onload="cargarReloj()">
                <!-- Acá mostraremos el reloj desde JavaScript -->
            </div>
        </div>
        <div class="col">

        </div>

        <!-- Fin parte borrada -->
        <ul class="header-nav ms-3">
            <li class="nav-item dropdown"><a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-md"><?= $this->Html->image('imgusers/' . $this->request->getSession()->read('Auth.image'), ['class' => 'avatar-img', 'alt' => 'user@email.com']) ?></div>
                </a>
                <div class="dropdown-menu dropdown-menu-end pt-0">
                    <div class="dropdown-header bg-light py-2">
                        <div class="fw-semibold">Settings</div>
                    </div><a class="dropdown-item" href="/users/view/<?= $this->request->getSession()->read('Auth.id') ?>">
                        <svg class="icon me-2">
                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                        </svg> Profile</a><a class="dropdown-item" href="#">
                        <svg class="icon me-2">
                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
                        </svg> Settings</a><a class="dropdown-item" href="#">
                        <svg class="icon me-2">
                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-credit-card"></use>
                        </svg> Payments<span class="badge badge-sm bg-secondary ms-2">42</span></a><a class="dropdown-item" href="#">
                        <svg class="icon me-2">
                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-file"></use>
                        </svg> Projects<span class="badge badge-sm bg-primary ms-2">42</span></a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="/Users/logout">

                        <svg class="icon me-2">
                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                        </svg> Logout</a>
                </div>
            </li>
        </ul>
    </div>
    <div class="header-divider"></div>
    <div class="container-fluid">
        <?php
            $this->Breadcrumbs->setTemplates([
                'wrapper' => '<nav aria-label="breadcrumb"><ol class="breadcrumb my-0 ms-2"{{attrs}}>{{content}}</ol></nav>',
                'item' => '<li class="breadcrumb-item" {{attrs}}><a href="{{url}}"{{innerAttrs}}>{{title}}</a></li>{{separator}}',
                'itemWithoutLink' => '<li class="breadcrumb-item active" aria-current="page"{{attrs}}><span{{innerAttrs}}>{{title}}</span></li>{{separator}}',
            ]);
            echo $this->Breadcrumbs->render(); 
        ?>
    </div>
</header>