<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Link> $links
 */


$this->Breadcrumbs->add([
    ['title' => 'Inicio', 'url' => '/'],
    ['title' => 'Enlaces Alfastreet']
]);
?>
<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <h2 class="card-title text-center"><?= __('Enlaces Alfastreet') ?></h2>
                    <p class="small text-medium-emphasis">&nbsp;</p>
                </div>
                <div class="btn-toolbar d-none d-md-block" role="toolbar" aria-label="Toolbar with buttons">
                    <?= $this->Html->link(__('Añadir Enlace'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-responsive table-striped table-hover table-sm table-bordered text-center" id="myTable">
                    <thead>
                        <tr>
                            <th><?= __('Enlace') ?></th>
                            <th><?= __('Credenciales') ?></th>
                            <th><?= __('url') ?></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($links as $link) : ?>
                            <tr>
                                <td><?= h($link->link) ?></td>
                                <td><?= h($link->credentials) ?></td>
                                <td><?= __('Acceder a: ') ?><a href="https://<?= h($link->url) ?>" target="_blank"><?= h($link->url) ?></a></td>
                                <td class="actions">
                                    <div class="btn-group btn-group-toggle mx-3">
                                            <a class="nav-link nav-group-toggle" href="/links/edit/<?= $link->id ?>">
                                                <svg class="nav-icon" width="20" height="20">
                                                    <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
                                                </svg>
                                            </a>
                                        <a class="nav-link nav-group-toggle" href="/links/view/<?= $link->id ?>">
                                            <svg class="nav-icon" width="20" height="20">
                                                <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-address-book"></use>
                                            </svg>
                                        </a>
                                            <a class="nav-link nav-group-toggle" href="/links/delete/<?= $link->id ?>">
                                                <svg class="nav-icon" width="20" height="20">
                                                    <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                                                </svg>
                                            </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>