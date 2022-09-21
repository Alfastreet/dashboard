<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Part $part
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Part'), ['action' => 'edit', $part->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Part'), ['action' => 'delete', $part->id], ['confirm' => __('Are you sure you want to delete # {0}?', $part->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Parts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Part'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="parts view content">
            <h3><?= h($part->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Serial') ?></th>
                    <td><?= h($part->serial) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($part->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($part->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Money Id') ?></th>
                    <td><?= $this->Number->format($part->money_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Value') ?></th>
                    <td><?= $this->Number->format($part->value) ?></td>
                </tr>
                <tr>
                    <th><?= __('Amount') ?></th>
                    <td><?= $this->Number->format($part->amount) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Machinepart') ?></h4>
                <?php if (!empty($part->machinepart)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Machine Id') ?></th>
                            <th><?= __('Part Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($part->machinepart as $machinepart) : ?>
                        <tr>
                            <td><?= h($machinepart->id) ?></td>
                            <td><?= h($machinepart->machine_id) ?></td>
                            <td><?= h($machinepart->part_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Machinepart', 'action' => 'view', $machinepart->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Machinepart', 'action' => 'edit', $machinepart->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Machinepart', 'action' => 'delete', $machinepart->id], ['confirm' => __('Are you sure you want to delete # {0}?', $machinepart->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
