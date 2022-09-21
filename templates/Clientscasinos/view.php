<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Clientscasino $clientscasino
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Clientscasino'), ['action' => 'edit', $clientscasino->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Clientscasino'), ['action' => 'delete', $clientscasino->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clientscasino->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Clientscasinos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Clientscasino'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="clientscasinos view content">
            <h3><?= h($clientscasino->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Casino') ?></th>
                    <td><?= $clientscasino->has('casino') ? $this->Html->link($clientscasino->casino->name, ['controller' => 'Casinos', 'action' => 'view', $clientscasino->casino->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($clientscasino->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Client Id') ?></th>
                    <td><?= $this->Number->format($clientscasino->client_id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
