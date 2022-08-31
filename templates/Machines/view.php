<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Machine $machine
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Machine'), ['action' => 'edit', $machine->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Machine'), ['action' => 'delete', $machine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $machine->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Machines'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Machine'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="machines view content">
            <h3><?= h($machine->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Serial') ?></th>
                    <td><?= h($machine->serial) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($machine->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Warranty') ?></th>
                    <td><?= h($machine->warranty) ?></td>
                </tr>
                <tr>
                    <th><?= __('Image') ?></th>
                    <td><?= h($machine->image) ?></td>
                </tr>
                <tr>
                    <th><?= __('Height') ?></th>
                    <td><?= h($machine->height) ?></td>
                </tr>
                <tr>
                    <th><?= __('Width') ?></th>
                    <td><?= h($machine->width) ?></td>
                </tr>
                <tr>
                    <th><?= __('Display') ?></th>
                    <td><?= h($machine->display) ?></td>
                </tr>
                <tr>
                    <th><?= __('Casino') ?></th>
                    <td><?= $machine->has('casino') ? $this->Html->link($machine->casino->name, ['controller' => 'Casinos', 'action' => 'view', $machine->casino->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($machine->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Idint') ?></th>
                    <td><?= $machine->idint === null ? '' : $this->Number->format($machine->idint) ?></td>
                </tr>
                <tr>
                    <th><?= __('YearModel') ?></th>
                    <td><?= $this->Number->format($machine->yearModel) ?></td>
                </tr>
                <tr>
                    <th><?= __('Model Id') ?></th>
                    <td><?= $this->Number->format($machine->model_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Maker Id') ?></th>
                    <td><?= $this->Number->format($machine->maker_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Owner Id') ?></th>
                    <td><?= $this->Number->format($machine->owner_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Company Id') ?></th>
                    <td><?= $this->Number->format($machine->company_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Contract Id') ?></th>
                    <td><?= $this->Number->format($machine->contract_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Accountants Id') ?></th>
                    <td><?= $this->Number->format($machine->accountants_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('DateInstalling') ?></th>
                    <td><?= h($machine->dateInstalling) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Accountants') ?></h4>
                <?php if (!empty($machine->accountants)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Machine Id') ?></th>
                            <th><?= __('Casino Id') ?></th>
                            <th><?= __('Day Init') ?></th>
                            <th><?= __('Day End') ?></th>
                            <th><?= __('Month Id') ?></th>
                            <th><?= __('Year') ?></th>
                            <th><?= __('Cashin') ?></th>
                            <th><?= __('Cashout') ?></th>
                            <th><?= __('Bet') ?></th>
                            <th><?= __('Win') ?></th>
                            <th><?= __('Profit') ?></th>
                            <th><?= __('Jackpot') ?></th>
                            <th><?= __('Gamesplayed') ?></th>
                            <th><?= __('Coljuegos') ?></th>
                            <th><?= __('Admin') ?></th>
                            <th><?= __('Total') ?></th>
                            <th><?= __('Alfastreet') ?></th>
                            <th><?= __('Image') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($machine->accountants as $accountants) : ?>
                        <tr>
                            <td><?= h($accountants->id) ?></td>
                            <td><?= h($accountants->machine_id) ?></td>
                            <td><?= h($accountants->casino_id) ?></td>
                            <td><?= h($accountants->day_init) ?></td>
                            <td><?= h($accountants->day_end) ?></td>
                            <td><?= h($accountants->month_id) ?></td>
                            <td><?= h($accountants->year) ?></td>
                            <td><?= h($accountants->cashin) ?></td>
                            <td><?= h($accountants->cashout) ?></td>
                            <td><?= h($accountants->bet) ?></td>
                            <td><?= h($accountants->win) ?></td>
                            <td><?= h($accountants->profit) ?></td>
                            <td><?= h($accountants->jackpot) ?></td>
                            <td><?= h($accountants->gamesplayed) ?></td>
                            <td><?= h($accountants->coljuegos) ?></td>
                            <td><?= h($accountants->admin) ?></td>
                            <td><?= h($accountants->total) ?></td>
                            <td><?= h($accountants->alfastreet) ?></td>
                            <td><?= h($accountants->image) ?></td>
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
            <div class="related">
                <h4><?= __('Related Machinepart') ?></h4>
                <?php if (!empty($machine->machinepart)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Machine Id') ?></th>
                            <th><?= __('Part Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($machine->machinepart as $machinepart) : ?>
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
