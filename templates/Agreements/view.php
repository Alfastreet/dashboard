<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Agreement $agreement
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Agreement'), ['action' => 'edit', $agreement->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Agreement'), ['action' => 'delete', $agreement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $agreement->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Agreements'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Agreement'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="agreements view content">
            <h3><?= h($agreement->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Machine') ?></th>
                    <td><?= $agreement->has('machine') ? $this->Html->link($agreement->machine->name, ['controller' => 'Machines', 'action' => 'view', $agreement->machine->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Discount') ?></th>
                    <td><?= h($agreement->discount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Agreementvalue') ?></th>
                    <td><?= h($agreement->agreementvalue) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nquote') ?></th>
                    <td><?= h($agreement->nquote) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quoteini') ?></th>
                    <td><?= h($agreement->quoteini) ?></td>
                </tr>
                <tr>
                    <th><?= __('Separation') ?></th>
                    <td><?= h($agreement->separation) ?></td>
                </tr>
                <tr>
                    <th><?= __('Agreementstatus') ?></th>
                    
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($agreement->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Client Id') ?></th>
                    <td><?= $this->Number->format($agreement->client_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Business Id') ?></th>
                    <td><?= $this->Number->format($agreement->business_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Datesigned') ?></th>
                    <td><?= h($agreement->datesigned) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Comments') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($agreement->comments)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
