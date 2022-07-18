<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tmpdetailsquote $tmpdetailsquote
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Tmpdetailsquote'), ['action' => 'edit', $tmpdetailsquote->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Tmpdetailsquote'), ['action' => 'delete', $tmpdetailsquote->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tmpdetailsquote->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Tmpdetailsquote'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Tmpdetailsquote'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tmpdetailsquote view content">
            <h3><?= h($tmpdetailsquote->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Value') ?></th>
                    <td><?= h($tmpdetailsquote->value) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($tmpdetailsquote->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('TypeProduct Id') ?></th>
                    <td><?= $this->Number->format($tmpdetailsquote->typeProduct_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Product Id') ?></th>
                    <td><?= $this->Number->format($tmpdetailsquote->product_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Amount') ?></th>
                    <td><?= $this->Number->format($tmpdetailsquote->amount) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
