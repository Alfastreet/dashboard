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
            <?= $this->Html->link(__('List Liquidation'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Liquidation'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="liquidation view content">
            <h3><?= h($liquidation->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Accountant') ?></th>
                    <td><?= $liquidation->has('accountant') ? $this->Html->link($liquidation->accountant->id, ['controller' => 'Accountants', 'action' => 'view', $liquidation->accountant->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Total') ?></th>
                    <td><?= h($liquidation->total) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($liquidation->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Accountantsstatus Id') ?></th>
                    <td><?= $this->Number->format($liquidation->accountantsstatus_id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
