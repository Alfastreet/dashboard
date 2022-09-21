<?php 

    $paginator = $this->Paginator->setTemplates([
        'prevActive' => '<li class="page-item"><a class="page-link" href="{{url}}">&lt;</a></li>',
        'number' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
        'current' => '<li class="page-item active"><a class="page-link" href="{{url}}">{{text}}</a></li>',
        'first' => '<li class="page-item"><a class="page-link" href="{{url}}">&laquo;</a></li>',
        'last' => '<li class="page-item"><a class="page-link" href="{{url}}">&raquo;</a></li>',
        'nextActive' => '<li class="page-item"><a class="page-link" href="{{url}}">&gt</a></li>',
    ])

?>

<div class="mb-4">
    <nav aria-label="Page navigation example">
    <p class="lead text-end"><?= $this->Paginator->counter(__('Pagina {{page}} De {{pages}}, Mostrando {{current}} Resultado(s) {{count}} Totales')) ?></p>
      <ul class="pagination justify-content-end">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
      </ul>
    </nav>
</div>