<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\State $state
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit State'), ['action' => 'edit', $state->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete State'), ['action' => 'delete', $state->id], ['confirm' => __('Are you sure you want to delete # {0}?', $state->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List State'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New State'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="state view content">
            <h3><?= h($state->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($state->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= $this->Number->format($state->name) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Casinos') ?></h4>
                <?php if (!empty($state->casinos)) : ?>
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
                        <?php foreach ($state->casinos as $casinos) : ?>
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
            <div class="related">
                <h4><?= __('Related City') ?></h4>
                <?php if (!empty($state->city)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('State Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($state->city as $city) : ?>
                        <tr>
                            <td><?= h($city->id) ?></td>
                            <td><?= h($city->name) ?></td>
                            <td><?= h($city->state_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'City', 'action' => 'view', $city->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'City', 'action' => 'edit', $city->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'City', 'action' => 'delete', $city->id], ['confirm' => __('Are you sure you want to delete # {0}?', $city->id)]) ?>
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
