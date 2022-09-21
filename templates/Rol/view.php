<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rol $rol
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Rol'), ['action' => 'edit', $rol->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Rol'), ['action' => 'delete', $rol->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rol->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Rol'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Rol'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="rol view content">
            <h3><?= h($rol->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Rol') ?></th>
                    <td><?= h($rol->rol) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($rol->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Users') ?></h4>
                <?php if (!empty($rol->users)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('LastName') ?></th>
                            <th><?= __('Address') ?></th>
                            <th><?= __('Phone') ?></th>
                            <th><?= __('Identification') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Password') ?></th>
                            <th><?= __('Token') ?></th>
                            <th><?= __('Rol Id') ?></th>
                            <th><?= __('Checked') ?></th>
                            <th><?= __('Image') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($rol->users as $users) : ?>
                        <tr>
                            <td><?= h($users->id) ?></td>
                            <td><?= h($users->name) ?></td>
                            <td><?= h($users->lastName) ?></td>
                            <td><?= h($users->address) ?></td>
                            <td><?= h($users->phone) ?></td>
                            <td><?= h($users->identification) ?></td>
                            <td><?= h($users->email) ?></td>
                            <td><?= h($users->password) ?></td>
                            <td><?= h($users->token) ?></td>
                            <td><?= h($users->rol_id) ?></td>
                            <td><?= h($users->checked) ?></td>
                            <td><?= h($users->image) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
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
