<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Erase $erase
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Erase'), ['action' => 'edit', $erase->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Erase'), ['action' => 'delete', $erase->id], ['confirm' => __('Are you sure you want to delete # {0}?', $erase->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Erases'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Erase'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="erases view content">
            <h3><?= h($erase->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Machine') ?></th>
                    <td><?= $erase->has('machine') ? $this->Html->link($erase->machine->name, ['controller' => 'Machines', 'action' => 'view', $erase->machine->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Image') ?></th>
                    <td><?= h($erase->image) ?></td>
                </tr>
                <tr>
                    <th><?= __('Alfastreet') ?></th>
                    <td><?= h($erase->alfastreet) ?></td>
                </tr>
                <tr>
                    <th><?= __('Total') ?></th>
                    <td><?= h($erase->total) ?></td>
                </tr>
                <tr>
                    <th><?= __('Admin') ?></th>
                    <td><?= h($erase->admin) ?></td>
                </tr>
                <tr>
                    <th><?= __('Coljuegos') ?></th>
                    <td><?= h($erase->coljuegos) ?></td>
                </tr>
                <tr>
                    <th><?= __('Gamesplayed') ?></th>
                    <td><?= h($erase->gamesplayed) ?></td>
                </tr>
                <tr>
                    <th><?= __('Jackpot') ?></th>
                    <td><?= h($erase->jackpot) ?></td>
                </tr>
                <tr>
                    <th><?= __('Profit') ?></th>
                    <td><?= h($erase->profit) ?></td>
                </tr>
                <tr>
                    <th><?= __('Win') ?></th>
                    <td><?= h($erase->win) ?></td>
                </tr>
                <tr>
                    <th><?= __('Bet') ?></th>
                    <td><?= h($erase->bet) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cashout') ?></th>
                    <td><?= h($erase->cashout) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cashin') ?></th>
                    <td><?= h($erase->cashin) ?></td>
                </tr>
                <tr>
                    <th><?= __('Year') ?></th>
                    <td><?= h($erase->year) ?></td>
                </tr>
                <tr>
                    <th><?= __('Month') ?></th>
                    <td><?= $erase->has('month') ? $this->Html->link($erase->month->id, ['controller' => 'Months', 'action' => 'view', $erase->month->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Day End') ?></th>
                    <td><?= h($erase->day_end) ?></td>
                </tr>
                <tr>
                    <th><?= __('Day Init') ?></th>
                    <td><?= h($erase->day_init) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($erase->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Details Id') ?></th>
                    <td><?= $this->Number->format($erase->details_id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
