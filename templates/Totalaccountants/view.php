<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Totalaccountant $totalaccountant
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Totalaccountant'), ['action' => 'edit', $totalaccountant->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Totalaccountant'), ['action' => 'delete', $totalaccountant->id], ['confirm' => __('Are you sure you want to delete # {0}?', $totalaccountant->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Totalaccountants'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Totalaccountant'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="totalaccountants view content">
            <h3><?= h($totalaccountant->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Casino') ?></th>
                    <td><?= $totalaccountant->has('casino') ? $this->Html->link($totalaccountant->casino->name, ['controller' => 'Casinos', 'action' => 'view', $totalaccountant->casino->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Machine') ?></th>
                    <td><?= $totalaccountant->has('machine') ? $this->Html->link($totalaccountant->machine->name, ['controller' => 'Machines', 'action' => 'view', $totalaccountant->machine->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Month') ?></th>
                    <td><?= $totalaccountant->has('month') ? $this->Html->link($totalaccountant->month->id, ['controller' => 'Months', 'action' => 'view', $totalaccountant->month->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Year') ?></th>
                    <td><?= h($totalaccountant->year) ?></td>
                </tr>
                <tr>
                    <th><?= __('TotalLiquidation') ?></th>
                    <td><?= h($totalaccountant->totalLiquidation) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($totalaccountant->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
