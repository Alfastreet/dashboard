<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Casino $casino
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Casino'), ['action' => 'edit', $casino->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Casino'), ['action' => 'delete', $casino->id], ['confirm' => __('Are you sure you want to delete # {0}?', $casino->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Casinos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Casino'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="casinos view content">
            <h3><?= h($casino->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($casino->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= h($casino->address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Image') ?></th>
                    <td><?= h($casino->image) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($casino->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone') ?></th>
                    <td><?= $this->Number->format($casino->phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('City Id') ?></th>
                    <td><?= $this->Number->format($casino->city_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('State Id') ?></th>
                    <td><?= $this->Number->format($casino->state_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Owner Id') ?></th>
                    <td><?= $this->Number->format($casino->owner_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Company Id') ?></th>
                    <td><?= $this->Number->format($casino->company_id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Clientscasinos') ?></h4>
                <?php if (!empty($casino->clientscasinos)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Client Id') ?></th>
                            <th><?= __('Casino Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($casino->clientscasinos as $clientscasinos) : ?>
                        <tr>
                            <td><?= h($clientscasinos->id) ?></td>
                            <td><?= h($clientscasinos->client_id) ?></td>
                            <td><?= h($clientscasinos->casino_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Clientscasinos', 'action' => 'view', $clientscasinos->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Clientscasinos', 'action' => 'edit', $clientscasinos->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Clientscasinos', 'action' => 'delete', $clientscasinos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clientscasinos->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Machines') ?></h4>
                <?php if (!empty($casino->machines)) : ?>
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
                        <?php foreach ($casino->machines as $machines) : ?>
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
