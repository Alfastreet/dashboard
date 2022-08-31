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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $casino->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $casino->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Casinos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="casinos form content">
            <?= $this->Form->create($casino, ['type' => 'file']) ?>
            <fieldset>
                <legend><?= __('Edit Casino') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('phone');
                    echo $this->Form->control('address');
                    echo $this->Form->control('city_id');
                    echo $this->Form->control('state_id');
                    echo $this->Form->control('owner_id');
                    echo $this->Form->control('business_id' , ['options' => $business]);
                    echo $this->Form->control('image' , ['type' => 'file' , 'required' => false ]);
                    echo $this->Html->image('Casinos/'.$casino->image , ['width' => 100]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Serial') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Maker Id') ?></th>
                            <th><?= __('Image') ?></th>
                            <th><?= __('DateInstalling') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($casino->machines as $machines) : ?>
                        <tr>
                            <td><?= h($machines->serial) ?></td>
                            <td><?= h($machines->name) ?></td>
                            <td><?= h($machines->maker_id) ?></td>
                            <td><?= h($machines->image) ?></td>
                            <td><?= h($machines->dateInstalling) ?></td>
                            <td class="actions">
                            <?= $this->Html->link(__('Añadir Contador'), ['controller' => 'Accountants', 'action' => 'add' , '?' => ['id' => $machines->id, 'casinoid' => $clientscasinos->casino_id]], ['class' => 'side-nav-item']) ?>
                                <?= $this->Html->link(__('View'), ['controller' => 'Machines', 'action' => 'view', $machines->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Machines', 'action' => 'edit', $machines->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Machines', 'action' => 'delete', $machines->id], ['confirm' => __('Are you sure you want to delete # {0}?', $machines->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
