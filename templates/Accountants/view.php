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
                    <th><?= __('Total Prof') ?></th>
                    <td><?= h($accountant->total_prof) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($accountant->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Month') ?></th>
                    <td><?= $this->Number->format($accountant->month) ?></td>
                </tr>
                <tr>
                    <th><?= __('Year') ?></th>
                    <td><?= $this->Number->format($accountant->year) ?></td>
                </tr>
                <tr>
                    <th><?= __('Accountantsstatus Id') ?></th>
                    <td><?= $this->Number->format($accountant->accountantsstatus_id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
