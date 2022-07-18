<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ownercompany $ownercompany
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Ownercompany'), ['action' => 'edit', $ownercompany->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Ownercompany'), ['action' => 'delete', $ownercompany->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ownercompany->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Ownercompany'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Ownercompany'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="ownercompany view content">
            <h3><?= h($ownercompany->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($ownercompany->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Owner Id') ?></th>
                    <td><?= $this->Number->format($ownercompany->owner_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Company Id') ?></th>
                    <td><?= $this->Number->format($ownercompany->company_id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
