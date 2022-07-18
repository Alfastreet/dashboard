<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quote $quote
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Quote'), ['action' => 'edit', $quote->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Quote'), ['action' => 'delete', $quote->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quote->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Quotes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Quote'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="quotes view content">
            <h3><?= h($quote->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $quote->has('user') ? $this->Html->link($quote->user->name, ['controller' => 'Users', 'action' => 'view', $quote->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Total') ?></th>
                    <td><?= h($quote->total) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($quote->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Business Id') ?></th>
                    <td><?= $this->Number->format($quote->business_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Estatus Id') ?></th>
                    <td><?= $this->Number->format($quote->estatus_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date') ?></th>
                    <td><?= h($quote->date) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Detailsquotes') ?></h4>
                <?php if (!empty($quote->detailsquotes)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Quote Id') ?></th>
                            <th><?= __('TypeProduct Id') ?></th>
                            <th><?= __('Product Id') ?></th>
                            <th><?= __('Amount') ?></th>
                            <th><?= __('Value') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($quote->detailsquotes as $detailsquotes) : ?>
                        <tr>
                            <td><?= h($detailsquotes->id) ?></td>
                            <td><?= h($detailsquotes->quote_id) ?></td>
                            <td><?= h($detailsquotes->typeProduct_id) ?></td>
                            <td><?= h($detailsquotes->product_id) ?></td>
                            <td><?= h($detailsquotes->amount) ?></td>
                            <td><?= h($detailsquotes->value) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Detailsquotes', 'action' => 'view', $detailsquotes->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Detailsquotes', 'action' => 'edit', $detailsquotes->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Detailsquotes', 'action' => 'delete', $detailsquotes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $detailsquotes->id)]) ?>
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
