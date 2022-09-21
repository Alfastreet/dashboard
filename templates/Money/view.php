<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Money $money
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Money'), ['action' => 'edit', $money->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Money'), ['action' => 'delete', $money->id], ['confirm' => __('Are you sure you want to delete # {0}?', $money->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Money'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Money'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="money view content">
            <h3><?= h($money->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($money->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('UrlData') ?></th>
                    <td><?= h($money->urlData) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($money->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Parts') ?></h4>
                <?php if (!empty($money->parts)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Serial') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Money Id') ?></th>
                            <th><?= __('Value') ?></th>
                            <th><?= __('Amount') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($money->parts as $parts) : ?>
                        <tr>
                            <td><?= h($parts->id) ?></td>
                            <td><?= h($parts->serial) ?></td>
                            <td><?= h($parts->name) ?></td>
                            <td><?= h($parts->money_id) ?></td>
                            <td><?= h($parts->value) ?></td>
                            <td><?= h($parts->amount) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Parts', 'action' => 'view', $parts->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Parts', 'action' => 'edit', $parts->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Parts', 'action' => 'delete', $parts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $parts->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Services') ?></h4>
                <?php if (!empty($money->services)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Serial') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Money Id') ?></th>
                            <th><?= __('Value') ?></th>
                            <th><?= __('Description') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($money->services as $services) : ?>
                        <tr>
                            <td><?= h($services->id) ?></td>
                            <td><?= h($services->serial) ?></td>
                            <td><?= h($services->name) ?></td>
                            <td><?= h($services->money_id) ?></td>
                            <td><?= h($services->value) ?></td>
                            <td><?= h($services->description) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Services', 'action' => 'view', $services->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Services', 'action' => 'edit', $services->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Services', 'action' => 'delete', $services->id], ['confirm' => __('Are you sure you want to delete # {0}?', $services->id)]) ?>
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
