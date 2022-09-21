<aside class="column">
        <div class="d-flex justify-content-between">
            <div class="">
                <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'btn btn-primary me-md-2']) ?>
            </div>
            <div class="">
                <?= $this->Html->link(__('Generar nueva Cotización'), ['action' => 'add'], ['class' => 'btn btn-primary me-md-2']) ?>
                <?= $this->Html->link(__('Descargar Cotización'), ['action' => 'getpdf', $quote->id], ['class' => 'btn btn-primary me-md-2']) ?>
            </div>
        </div>
    </aside>