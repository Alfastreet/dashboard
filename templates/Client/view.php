<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
 */
?>

<?php include_once __DIR__.'/../layout/templates/header.php' ?>

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Client'), ['action' => 'edit', $client->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Client'), ['action' => 'delete', $client->id], ['confirm' => __('Are you sure you want to delete # {0}?', $client->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Client'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Client'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="client view content">
            <h3><?= h($client->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($client->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($client->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($client->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone') ?></th>
                    <td><?= $this->Number->format($client->phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Position Id') ?></th>
                    <td><?= $this->Number->format($client->position_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Business Id') ?></th>
                    <td><?= $this->Number->format($client->business_id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Clientscasinos') ?></h4>
                <?php if (!empty($client->clientscasinos)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Client Id') ?></th>
                            <th><?= __('Casino Id') ?></th>
                            <th><?= __('Contadores')?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($client->clientscasinos as $clientscasinos) : ?>
                        <tr>
                            <td><?= h($clientscasinos->id) ?></td>
                            <td><?= h($clientscasinos->client_id) ?></td>
                            <td><?= h($clientscasinos->casino_id) ?></td>
                            <td></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Clientscasinos', 'action' => 'view', $clientscasinos->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Clientscasinos', 'action' => 'edit', $clientscasinos->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Clientscasinos', 'action' => 'delete', $clientscasinos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clientscasinos->id)]) ?>
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
