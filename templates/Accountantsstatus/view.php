<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Accountantsstatus $accountantsstatus
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Accountantsstatus'), ['action' => 'edit', $accountantsstatus->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Accountantsstatus'), ['action' => 'delete', $accountantsstatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $accountantsstatus->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Accountantsstatus'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Accountantsstatus'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="accountantsstatus view content">
            <h3><?= h($accountantsstatus->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($accountantsstatus->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($accountantsstatus->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Accountants') ?></h4>
                <?php if (!empty($accountantsstatus->accountants)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Machine Id') ?></th>
                            <th><?= __('Casino Id') ?></th>
                            <th><?= __('Month') ?></th>
                            <th><?= __('Year') ?></th>
                            <th><?= __('Total Prof') ?></th>
                            <th><?= __('Token') ?></th>
                            <th><?= __('Accountantsstatus Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($accountantsstatus->accountants as $accountants) : ?>
                        <tr>
                            <td><?= h($accountants->id) ?></td>
                            <td><?= h($accountants->machine_id) ?></td>
                            <td><?= h($accountants->casino_id) ?></td>
                            <td><?= h($accountants->month) ?></td>
                            <td><?= h($accountants->year) ?></td>
                            <td><?= h($accountants->total_prof) ?></td>
                            <td><?= h($accountants->token) ?></td>
                            <td><?= h($accountants->accountantsstatus_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Accountants', 'action' => 'view', $accountants->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Accountants', 'action' => 'edit', $accountants->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Accountants', 'action' => 'delete', $accountants->id], ['confirm' => __('Are you sure you want to delete # {0}?', $accountants->id)]) ?>
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
