<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client[]|\Cake\Collection\CollectionInterface $client
 */
?>

<?php include_once __DIR__.'/../layout/templates/header.php' ?>

<div class="newClient">
    <?= $this->Html->link(__('Nuevo Cliente'), ['action' => 'add'], ['class' => 'button float-right']) ?>
</div>

<div class="client index content">

    <h3><?= __('Client') ?></h3>
    
        <table class="table table-bordered table-striped table-responsive text-center table-hover">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('phone') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('position_id') ?></th>
                    <th><?= $this->Paginator->sort('business_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($client as $client): ?>
                <tr>
                    <td><?= $this->Number->format($client->id) ?></td>
                    <td><?= h($client->name) ?></td>
                    <td><?= h($client->phone) ?></td>
                    <td><?= h($client->email) ?></td>
                    <td><?= $client->has('clientposition') ? h($client->clientposition->position) : '' ?></td>
                    <td><?= $client->has('busines') ? h ($client->busines->name) : '' ?></td>
                    <td class="actions">

                        <?= $this->Html->link(
                                $this->Html->image("eye-fill.svg", ["alt" => "View"]),
                                "/client/view/".$client->id,
                                ['escape' => false],
                            ); ?>
                            
                        <?= $this->Html->link(
                                $this->Html->image("pencil-fill.svg", ["alt" => "Edit"]),
                                "/client/edit/".$client->id,
                                ['escape' => false],
                            ); ?>

                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
