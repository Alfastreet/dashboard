<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Maker $maker
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Maker'), ['action' => 'edit', $maker->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Maker'), ['action' => 'delete', $maker->id], ['confirm' => __('Are you sure you want to delete # {0}?', $maker->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Maker'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Maker'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="maker view content">
            <h3><?= h($maker->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($maker->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($maker->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Machines') ?></h4>
                <?php if (!empty($maker->machines)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Serial') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('YearModel') ?></th>
                            <th><?= __('Model Id') ?></th>
                            <th><?= __('Maker Id') ?></th>
                            <th><?= __('Warranty') ?></th>
                            <th><?= __('Image') ?></th>
                            <th><?= __('Height') ?></th>
                            <th><?= __('Width') ?></th>
                            <th><?= __('Display') ?></th>
                            <th><?= __('DateInstalling') ?></th>
                            <th><?= __('Casino Id') ?></th>
                            <th><?= __('Owner Id') ?></th>
                            <th><?= __('Company Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($maker->machines as $machines) : ?>
                        <tr>
                            <td><?= h($machines->id) ?></td>
                            <td><?= h($machines->serial) ?></td>
                            <td><?= h($machines->name) ?></td>
                            <td><?= h($machines->yearModel) ?></td>
                            <td><?= h($machines->model_id) ?></td>
                            <td><?= h($machines->maker_id) ?></td>
                            <td><?= h($machines->warranty) ?></td>
                            <td><?= h($machines->image) ?></td>
                            <td><?= h($machines->height) ?></td>
                            <td><?= h($machines->width) ?></td>
                            <td><?= h($machines->display) ?></td>
                            <td><?= h($machines->dateInstalling) ?></td>
                            <td><?= h($machines->casino_id) ?></td>
                            <td><?= h($machines->owner_id) ?></td>
                            <td><?= h($machines->company_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Machines', 'action' => 'view', $machines->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Machines', 'action' => 'edit', $machines->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Machines', 'action' => 'delete', $machines->id], ['confirm' => __('Are you sure you want to delete # {0}?', $machines->id)]) ?>
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
