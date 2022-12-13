<?php

/** 
 *@var \App\View\AppView $this
 *@var \App\Model\Entity\Accountant $accountant
 *@var string[]|\Cake\Collection\CollectionInterface $machines
 *@var string[]|\Cake\Collection\CollectionInterface $casinos
 */
?>
<?= $this->Html->meta('csrfToken', $this->request->getAttribute('csrfToken'), ['id' => 'csrfToken']); ?>
<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-4">
                <h2 class="card-title"><?= __('Agregar participaciones') ?></h2>
                <?= $this->Html->link('Volver', ['action' => 'general'], ['class' => 'btn btn-primary']) ?>
            </div>
            <div class="mb-4">
                <div class="row mb-4">
                    <div class="col-4">
                        <?= $this->Form->control('casino_id', ['options' => $casinos, 'class' => 'form-control', 'label' => false, 'id' => 'casino', 'empty' => ['0' => 'Seleccione un casino']])  ?>
                    </div>
                    <div class="col-4" id="machines">

                    </div>
                </div>
                <div class="row">
                    <div class="col-6" id="lasted">

                    </div>
                    <div class="col-6" id="formnewaccountant">

                    </div>
                </div>
            </div>
            <div class="mb-4" id="tableAccountant">
                
            </div>
            <div class="mb-4" id="liquidations">
                
            </div>
        </div>
    </div>
</div>
<?= $this->Html->script('newaccountants') ?>