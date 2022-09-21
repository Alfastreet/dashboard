<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Month $month
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Month'), ['action' => 'edit', $month->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Month'), ['action' => 'delete', $month->id], ['confirm' => __('Are you sure you want to delete # {0}?', $month->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Month'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Month'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="month view content">
            <h3><?= h($month->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Month') ?></th>
                    <td><?= h($month->month) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($month->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
