<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Detailsaccountant $detailsaccountant
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Detailsaccountant'), ['action' => 'edit', $detailsaccountant->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Detailsaccountant'), ['action' => 'delete', $detailsaccountant->id], ['confirm' => __('Are you sure you want to delete # {0}?', $detailsaccountant->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Detailsaccountants'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Detailsaccountant'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="detailsaccountants view content">
            <h3><?= h($detailsaccountant->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Accountant') ?></th>
                    <td><?= $detailsaccountant->has('accountant') ? $this->Html->link($detailsaccountant->accountant->id, ['controller' => 'Accountants', 'action' => 'view', $detailsaccountant->accountant->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Total Init') ?></th>
                    <td><?= h($detailsaccountant->total_init) ?></td>
                </tr>
                <tr>
                    <th><?= __('Total End') ?></th>
                    <td><?= h($detailsaccountant->total_end) ?></td>
                </tr>
                <tr>
                    <th><?= __('Profit') ?></th>
                    <td><?= h($detailsaccountant->profit) ?></td>
                </tr>
                <tr>
                    <th><?= __('Coljuegoa') ?></th>
                    <td><?= h($detailsaccountant->coljuegoa) ?></td>
                </tr>
                <tr>
                    <th><?= __('Iva') ?></th>
                    <td><?= h($detailsaccountant->iva) ?></td>
                </tr>
                <tr>
                    <th><?= __('Juegos Jug') ?></th>
                    <td><?= h($detailsaccountant->juegos_jug) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($detailsaccountant->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Day Init') ?></th>
                    <td><?= $this->Number->format($detailsaccountant->day_init) ?></td>
                </tr>
                <tr>
                    <th><?= __('Day End') ?></th>
                    <td><?= $this->Number->format($detailsaccountant->day_end) ?></td>
                </tr>
                <tr>
                    <th><?= __('Month') ?></th>
                    <td><?= $this->Number->format($detailsaccountant->month) ?></td>
                </tr>
                <tr>
                    <th><?= __('Year') ?></th>
                    <td><?= $this->Number->format($detailsaccountant->year) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
