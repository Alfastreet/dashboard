<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Company[]|\Cake\Collection\CollectionInterface $company
 */
?>

<?php include_once __DIR__.'/../layout/templates/header.php' ?>

<div class="company index content">
    <?= $this->Html->link(__('New Company'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Company') ?></h3>
    <div>
        <table class="table table-bordered table-striped table-responsive text-center table-hover">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('phone') ?></th>
                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('business_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($company as $company): ?>
                <tr>
                    <td><?= $this->Number->format($company->id) ?></td>
                    <td><?= h($company->name) ?></td>
                    <td><?= $this->Number->format($company->phone) ?></td>
                    <td><?= h($company->address) ?></td>
                    <td><?= h($company->email) ?></td>
                    <td><?= $this->Number->format($company->business_id) ?></td>
                    <td class="actions">
                    <?= $this->Html->link(
                                $this->Html->image("eye-fill.svg", ["alt" => "View"]),
                                "/company/view/".$company->id,
                                ['escape' => false],
                            ); ?>
                            
                        <?= $this->Html->link(
                                $this->Html->image("pencil-fill.svg", ["alt" => "Edit"]),
                                "/company/edit/".$company->id,
                                ['escape' => false],
                            ); ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li><?= $this->Paginator->first('<< ' . __('first')) ?></li>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
    </nav>
</div>
