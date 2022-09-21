<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Typeproduct $typeproduct
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Typeproduct'), ['action' => 'edit', $typeproduct->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Typeproduct'), ['action' => 'delete', $typeproduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $typeproduct->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Typeproduct'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Typeproduct'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="typeproduct view content">
            <h3><?= h($typeproduct->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= h($typeproduct->type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($typeproduct->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
