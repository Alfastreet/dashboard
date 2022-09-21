<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Detailsquote $detailsquote
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Detailsquote'), ['action' => 'edit', $detailsquote->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Detailsquote'), ['action' => 'delete', $detailsquote->id], ['confirm' => __('Are you sure you want to delete # {0}?', $detailsquote->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Detailsquotes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Detailsquote'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="detailsquotes view content">
            <h3><?= h($detailsquote->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Quote') ?></th>
                    <td><?= $detailsquote->has('quote') ? $this->Html->link($detailsquote->quote->id, ['controller' => 'Quotes', 'action' => 'view', $detailsquote->quote->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Value') ?></th>
                    <td><?= h($detailsquote->value) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($detailsquote->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('TypeProduct Id') ?></th>
                    <td><?= $this->Number->format($detailsquote->typeProduct_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Product Id') ?></th>
                    <td><?= $this->Number->format($detailsquote->product_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Amount') ?></th>
                    <td><?= $this->Number->format($detailsquote->amount) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
