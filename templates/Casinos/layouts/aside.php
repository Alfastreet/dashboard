<aside class="column">
    <div class="d-flex justify-content-between">
        <div class="">
            <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'btn btn-primary me-md-2']) ?>
        </div>
        <?php if ($isAdmin) : ?>
            <div class="">
                <?= $this->Html->link(__('Editar'), ['action' => 'edit', $casino->id], ['class' => 'btn btn-primary me-md-2']) ?>
                <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $casino->id], ['confirm' => __('Estas Seguro de eliminar la entrada # {0}?', $casino->id), 'class' => 'btn btn-danger me-md-2']) ?>
            </div>
        <?php endif ?>
    </div>
</aside>