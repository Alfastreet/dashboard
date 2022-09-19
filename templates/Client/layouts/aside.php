<aside class="column">
        <div class="d-flex justify-content-between">
            <div class="">
                <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'btn btn-primary me-md-2']) ?>
            </div>
            <div class="">
                <?= $this->Html->link(__('Editar'), ['action' => 'edit', $client->id], ['class' => 'btn btn-primary me-md-2']) ?>
                <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $client->id], ['confirm' => __('Estas Seguro de eliminar la entrada # {0}?', $client->id), 'class' => 'btn btn-danger me-md-2']) ?>
            </div>
        </div>
    </aside>