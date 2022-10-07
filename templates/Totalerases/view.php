<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Totalerase $totalerase
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Totalerase'), ['action' => 'edit', $totalerase->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Totalerase'), ['action' => 'delete', $totalerase->id], ['confirm' => __('Are you sure you want to delete # {0}?', $totalerase->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Totalerases'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Totalerase'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="totalerases view content">
            <h3><?= h($totalerase->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Casino') ?></th>
                    <td><?= $totalerase->has('casino') ? $this->Html->link($totalerase->casino->name, ['controller' => 'Casinos', 'action' => 'view', $totalerase->casino->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Month') ?></th>
                    <td><?= $totalerase->has('month') ? $this->Html->link($totalerase->month->id, ['controller' => 'Months', 'action' => 'view', $totalerase->month->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Year') ?></th>
                    <td><?= h($totalerase->year) ?></td>
                </tr>
                <tr>
                    <th><?= __('Total') ?></th>
                    <td><?= h($totalerase->total) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($totalerase->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
