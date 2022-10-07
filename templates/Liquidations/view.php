<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Liquidation $liquidation
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Liquidation'), ['action' => 'edit', $liquidation->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Liquidation'), ['action' => 'delete', $liquidation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $liquidation->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Liquidations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Liquidation'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="liquidations view content">
            <h3><?= h($liquidation->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Casino') ?></th>
                    <td><?= $liquidation->has('casino') ? $this->Html->link($liquidation->casino->name, ['controller' => 'Casinos', 'action' => 'view', $liquidation->casino->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Machine') ?></th>
                    <td><?= $liquidation->has('machine') ? $this->Html->link($liquidation->machine->name, ['controller' => 'Machines', 'action' => 'view', $liquidation->machine->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Month') ?></th>
                    <td><?= $liquidation->has('month') ? $this->Html->link($liquidation->month->id, ['controller' => 'Months', 'action' => 'view', $liquidation->month->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Cashin') ?></th>
                    <td><?= h($liquidation->cashin) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cashout') ?></th>
                    <td><?= h($liquidation->cashout) ?></td>
                </tr>
                <tr>
                    <th><?= __('Bet') ?></th>
                    <td><?= h($liquidation->bet) ?></td>
                </tr>
                <tr>
                    <th><?= __('Win') ?></th>
                    <td><?= h($liquidation->win) ?></td>
                </tr>
                <tr>
                    <th><?= __('Profit') ?></th>
                    <td><?= h($liquidation->profit) ?></td>
                </tr>
                <tr>
                    <th><?= __('Jackpot') ?></th>
                    <td><?= h($liquidation->jackpot) ?></td>
                </tr>
                <tr>
                    <th><?= __('Games') ?></th>
                    <td><?= h($liquidation->games) ?></td>
                </tr>
                <tr>
                    <th><?= __('Coljuegos') ?></th>
                    <td><?= h($liquidation->coljuegos) ?></td>
                </tr>
                <tr>
                    <th><?= __('Admin') ?></th>
                    <td><?= h($liquidation->admin) ?></td>
                </tr>
                <tr>
                    <th><?= __('Total') ?></th>
                    <td><?= h($liquidation->total) ?></td>
                </tr>
                <tr>
                    <th><?= __('Alfastreet') ?></th>
                    <td><?= h($liquidation->alfastreet) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($liquidation->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Year') ?></th>
                    <td><?= $this->Number->format($liquidation->year) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
