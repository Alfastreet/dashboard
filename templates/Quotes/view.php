<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quote $quote
 */
?>
<div class="col-12">
    <div class="mb-3">
        <?php include_once __DIR__ . '/layouts/aside.php' ?>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <div class="column-responsive column-80">
                <div class="quote view content">
                    <h2 class="text-center card-title"><?= __('Cotización #' . $quote->id) ?></h2>
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label fw-bold"><?= __('Cotizacion creada por:') ?></label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $quote->has('user') ? h($quote->user->name.' '.$quote->user->lastName) : '' ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">

    <div class="column-responsive column-80">
        <div class="quotes view content">
            <h3></h3>
            <table>
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
                                <!-- <th class="actions"><?= __('Actions') ?></th> -->
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
                                        <!-- <?= $this->Html->link(__('View'), ['controller' => 'Detailsquotes', 'action' => 'view', $detailsquotes->id]) ?> -->
                                        <!-- <?= $this->Html->link(__('Edit'), ['controller' => 'Detailsquotes', 'action' => 'edit', $detailsquotes->id]) ?> -->
                                        <!-- <?= $this->Form->postLink(__('Delete'), ['controller' => 'Detailsquotes', 'action' => 'delete', $detailsquotes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $detailsquotes->id)]) ?> -->
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