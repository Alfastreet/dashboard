<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Accountant[]|\Cake\Collection\CollectionInterface $accountants
 */
?>
<?php include_once __DIR__.'/../layout/templates/header.php' ?>

<div class="accountants index content">
    <h3><?= __('Accountants') ?></h3>
    <div class="table-responsive">
        <table class="table table-responsive table-striped table-bordered text-center">
            <thead class="thead-dark">
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('machine_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('casino_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('day_init') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('day_end') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('month') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('year') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('cashin') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('cashout') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('bet') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('win') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('profit') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('jackpot') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('gamesplayed') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('coljuegos') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('admin') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('total') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('alfastreet') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('image') ?></th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($accountants as $accountant): ?>
                <tr>
                    <td scope="row"><?= $this->Number->format($accountant->id) ?></td>
                    <td><?= $accountant->has('machine') ? $this->Html->link($accountant->machine->name, ['controller' => 'Machines', 'action' => 'view', $accountant->machine->id]) : '' ?></td>
                    <td><?= $accountant->has('casino') ? $this->Html->link($accountant->casino->name, ['controller' => 'Casinos', 'action' => 'view', $accountant->casino->id]) : '' ?></td>
                    <td><?= h($accountant->day_init) ?></td>
                    <td><?= h($accountant->day_end) ?></td>
                    <td><?= h($accountant->month_id) ?></td>
                    <td><?= h($accountant->year) ?></td>
                    <td><?= $this->Number->currency($accountant->cashin, 'USD') ?></td>
                    <td><?= $this->Number->currency($accountant->cashout, 'USD') ?></td>
                    <td><?= $this->Number->currency($accountant->bet, 'USD') ?></td>
                    <td><?= $this->Number->currency($accountant->win, 'USD') ?></td>
                    <td><?= $this->Number->currency($accountant->profit, 'USD') ?></td>
                    <td><?= $this->Number->currency($accountant->jackpot, 'USD') ?></td>
                    <td><?= h($accountant->gamesplayed) ?></td>
                    <td><?= $this->Number->currency($accountant->coljuegos, 'USD') ?></td>
                    <td><?= $this->Number->currency($accountant->admin, 'USD') ?></td>
                    <td><?= $this->Number->currency($accountant->total, 'USD') ?></td>
                    <td><?= $this->Number->currency($accountant->alfastreet, 'USD') ?></td>
                    <td><?= $this->Html->image('Accountants/'.$accountant->image) ?></td>
                    
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
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
