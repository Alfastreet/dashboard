<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Accountant $accountant
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Accountant'), ['action' => 'edit', $accountant->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Accountant'), ['action' => 'delete', $accountant->id], ['confirm' => __('Are you sure you want to delete # {0}?', $accountant->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Accountants'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Accountant'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="accountants view content">
            <h3><?= h($accountant->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Machine') ?></th>
                    <td><?= $accountant->has('machine') ? $this->Html->link($accountant->machine->name, ['controller' => 'Machines', 'action' => 'view', $accountant->machine->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Casino') ?></th>
                    <td><?= $accountant->has('casino') ? $this->Html->link($accountant->casino->name, ['controller' => 'Casinos', 'action' => 'view', $accountant->casino->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Day Init') ?></th>
                    <td><?= h($accountant->day_init) ?></td>
                </tr>
                <tr>
                    <th><?= __('Day End') ?></th>
                    <td><?= h($accountant->day_end) ?></td>
                </tr>
                <tr>
                    <th><?= __('Month') ?></th>
                    <td><?= h($accountant->month) ?></td>
                </tr>
                <tr>
                    <th><?= __('Year') ?></th>
                    <td><?= h($accountant->year) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cashin') ?></th>
                    <td><?= h($accountant->cashin) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cashout') ?></th>
                    <td><?= h($accountant->cashout) ?></td>
                </tr>
                <tr>
                    <th><?= __('Bet') ?></th>
                    <td><?= h($accountant->bet) ?></td>
                </tr>
                <tr>
                    <th><?= __('Win') ?></th>
                    <td><?= h($accountant->win) ?></td>
                </tr>
                <tr>
                    <th><?= __('Profit') ?></th>
                    <td><?= h($accountant->profit) ?></td>
                </tr>
                <tr>
                    <th><?= __('Jackpot') ?></th>
                    <td><?= h($accountant->jackpot) ?></td>
                </tr>
                <tr>
                    <th><?= __('Gamesplayed') ?></th>
                    <td><?= h($accountant->gamesplayed) ?></td>
                </tr>
                <tr>
                    <th><?= __('Coljuegos') ?></th>
                    <td><?= h($accountant->coljuegos) ?></td>
                </tr>
                <tr>
                    <th><?= __('Admin') ?></th>
                    <td><?= h($accountant->admin) ?></td>
                </tr>
                <tr>
                    <th><?= __('Total') ?></th>
                    <td><?= h($accountant->total) ?></td>
                </tr>
                <tr>
                    <th><?= __('Alfastreet') ?></th>
                    <td><?= h($accountant->alfastreet) ?></td>
                </tr>
                <tr>
                    <th><?= __('Image') ?></th>
                    <td><?= h($accountant->image) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($accountant->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
