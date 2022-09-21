<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Clientposition $clientposition
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Clientposition'), ['action' => 'edit', $clientposition->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Clientposition'), ['action' => 'delete', $clientposition->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clientposition->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Clientposition'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Clientposition'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="clientposition view content">
            <h3><?= h($clientposition->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Position') ?></th>
                    <td><?= h($clientposition->position) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($clientposition->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
