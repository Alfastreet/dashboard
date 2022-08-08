<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Accountantsdetail $accountantsdetail
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Accountantsdetail'), ['action' => 'edit', $accountantsdetail->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Accountantsdetail'), ['action' => 'delete', $accountantsdetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $accountantsdetail->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Accountantsdetails'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Accountantsdetail'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="accountantsdetails view content">
            <h3><?= h($accountantsdetail->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Accountant') ?></th>
                    <td><?= $accountantsdetail->has('accountant') ? $this->Html->link($accountantsdetail->accountant->id, ['controller' => 'Accountants', 'action' => 'view', $accountantsdetail->accountant->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($accountantsdetail->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Details Id') ?></th>
                    <td><?= $this->Number->format($accountantsdetail->details_id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
