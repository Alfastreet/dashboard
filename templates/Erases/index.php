<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Erase> $erases
 */
?>
<div class="erases index content">
    <?= $this->Html->link(__('New Erase'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Erases') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($erases as $erase): ?>
                <tr>
                    
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
