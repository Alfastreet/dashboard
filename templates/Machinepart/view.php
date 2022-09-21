<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Machinepart $machinepart
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Machinepart'), ['action' => 'edit', $machinepart->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Machinepart'), ['action' => 'delete', $machinepart->id], ['confirm' => __('Are you sure you want to delete # {0}?', $machinepart->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Machinepart'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Machinepart'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="machinepart view content">
            <h3><?= h($machinepart->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Machine') ?></th>
                    <td><?= $machinepart->has('machine') ? $this->Html->link($machinepart->machine->name, ['controller' => 'Machines', 'action' => 'view', $machinepart->machine->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Part') ?></th>
                    <td><?= $machinepart->has('part') ? $this->Html->link($machinepart->part->name, ['controller' => 'Parts', 'action' => 'view', $machinepart->part->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($machinepart->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
