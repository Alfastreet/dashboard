<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\City $city
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit City'), ['action' => 'edit', $city->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete City'), ['action' => 'delete', $city->id], ['confirm' => __('Are you sure you want to delete # {0}?', $city->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List City'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New City'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="city view content">
            <h3><?= h($city->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($city->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($city->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('State Id') ?></th>
                    <td><?= $this->Number->format($city->state_id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Casinos') ?></h4>
                <?php if (!empty($city->casinos)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Phone') ?></th>
                            <th><?= __('Address') ?></th>
                            <th><?= __('City Id') ?></th>
                            <th><?= __('State Id') ?></th>
                            <th><?= __('Owner Id') ?></th>
                            <th><?= __('Company Id') ?></th>
                            <th><?= __('Image') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($city->casinos as $casinos) : ?>
                        <tr>
                            <td><?= h($casinos->id) ?></td>
                            <td><?= h($casinos->name) ?></td>
                            <td><?= h($casinos->phone) ?></td>
                            <td><?= h($casinos->address) ?></td>
                            <td><?= h($casinos->city_id) ?></td>
                            <td><?= h($casinos->state_id) ?></td>
                            <td><?= h($casinos->owner_id) ?></td>
                            <td><?= h($casinos->company_id) ?></td>
                            <td><?= h($casinos->image) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Casinos', 'action' => 'view', $casinos->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Casinos', 'action' => 'edit', $casinos->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Casinos', 'action' => 'delete', $casinos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $casinos->id)]) ?>
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
