<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Company $company
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Company'), ['action' => 'edit', $company->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Company'), ['action' => 'delete', $company->id], ['confirm' => __('Are you sure you want to delete # {0}?', $company->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Company'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Company'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="company view content">
            <h3><?= h($company->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($company->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= h($company->address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($company->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($company->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone') ?></th>
                    <td><?= $this->Number->format($company->phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Business') ?></th>
                    <td><?= $this->Number->format($company->business_id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Casinos') ?></h4>
                <?php if (!empty($company->casinos)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Phone') ?></th>
                            <th><?= __('Address') ?></th>
                            <th><?= __('City Id') ?></th>
                            <th><?= __('State Id') ?></th>
                            <th><?= __('Owner Id') ?></th>
                            <th><?= __('Company Id') ?></th>
                            <th><?= __('Image') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($company->casinos as $casinos) : ?>
                        <tr>
                            <td><?= h($casinos->id) ?></td>
                            <td><?= h($casinos->name) ?></td>
                            <td><?= h($casinos->phone) ?></td>
                            <td><?= h($casinos->address) ?></td>
                            <td><?= h($casinos->city_id) ?></td>
                            <td><?= h($casinos->state_id) ?></td>
                            <td><?= h($casinos->owner_id) ?></td>
                            <td><?= h($casinos->company_id) ?></td>
                            <td><?= h($casinos->image) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Casinos', 'action' => 'view', $casinos->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Casinos', 'action' => 'edit', $casinos->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Casinos', 'action' => 'delete', $casinos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $casinos->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Machines') ?></h4>
                <?php if (!empty($company->machines)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Serial') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('YearModel') ?></th>
                            <th><?= __('Model Id') ?></th>
                            <th><?= __('Maker Id') ?></th>
                            <th><?= __('Warranty') ?></th>
                            <th><?= __('Image') ?></th>
                            <th><?= __('Height') ?></th>
                            <th><?= __('Width') ?></th>
                            <th><?= __('Display') ?></th>
                            <th><?= __('DateInstalling') ?></th>
                            <th><?= __('Casino Id') ?></th>
                            <th><?= __('Owner Id') ?></th>
                            <th><?= __('Company Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($company->machines as $machines) : ?>
                        <tr>
                            <td><?= h($machines->id) ?></td>
                            <td><?= h($machines->serial) ?></td>
                            <td><?= h($machines->name) ?></td>
                            <td><?= h($machines->yearModel) ?></td>
                            <td><?= h($machines->model_id) ?></td>
                            <td><?= h($machines->maker_id) ?></td>
                            <td><?= h($machines->warranty) ?></td>
                            <td><?= h($machines->image) ?></td>
                            <td><?= h($machines->height) ?></td>
                            <td><?= h($machines->width) ?></td>
                            <td><?= h($machines->display) ?></td>
                            <td><?= h($machines->dateInstalling) ?></td>
                            <td><?= h($machines->casino_id) ?></td>
                            <td><?= h($machines->owner_id) ?></td>
                            <td><?= h($machines->company_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Machines', 'action' => 'view', $machines->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Machines', 'action' => 'edit', $machines->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Machines', 'action' => 'delete', $machines->id], ['confirm' => __('Are you sure you want to delete # {0}?', $machines->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Ownercompany') ?></h4>
                <?php if (!empty($company->ownercompany)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Owner Id') ?></th>
                            <th><?= __('Company Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($company->ownercompany as $ownercompany) : ?>
                        <tr>
                            <td><?= h($ownercompany->id) ?></td>
                            <td><?= h($ownercompany->owner_id) ?></td>
                            <td><?= h($ownercompany->company_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Ownercompany', 'action' => 'view', $ownercompany->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Ownercompany', 'action' => 'edit', $ownercompany->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Ownercompany', 'action' => 'delete', $ownercompany->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ownercompany->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Bussiness') ?></h4>
                <h4><?php print_r($company->ownercompany) ?></h4>
                <?php if (!empty($company->busines)) :  ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Owner Id') ?></th>
                            <th><?= __('Company Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($company->busines as $business) : ?>
                        <tr>
                            <td><?= h($business->id) ?></td>
                            <td><?= h($business->name) ?></td>
                            <td><?= h($business->address) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Ownercompany', 'action' => 'view', $business->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Ownercompany', 'action' => 'edit', $business->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Ownercompany', 'action' => 'delete', $business->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ownercompany->id)]) ?>
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
