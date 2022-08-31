<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Casino $casino
 */
?>


<div class="container">

    <h3><?= h($casino->name) ?></h3>

    <div class="row">
        <div class="col">
            <?= h($casino->address) ?>
            <?= $this->Number->format($casino->phone) ?>
            <?= $casino->has('city') ? h($casino->city->name) :'' ?>
            <?= $casino->has('state') ? h($casino->state->name) :'' ?>
        </div>
        <div class="col">
            <?= $this->Html->image('Casinos/'.$casino->image) ?>
        </div>
    </div>

</div>


<div class="container">

  <div class="row">

    <div class="col">

        <div class="column-responsive column-80">
            <div class="accountants form content">
                <?= $this->Form->create($accountants, ['type' => 'file', 'url' => ['controller' => 'accountants', 'action' => 'add', '?' => ['casinoid' => $casino->id]]]) ?>
                <fieldset>
                    <legend><?= __('Añadir Contador') ?></legend>
                    <div class="row">
                        <div class="col">
                        <?php
                            echo $this->Form->control('machine_id' ,[ 'required' => false, 'disabled' => false, 'class' => 'form-control']);
                            echo $this->Form->control('day_init', ['disabled' => true, 'id' => 'dayInit', 'class' => 'form-control']);
                            echo $this->Form->control('day_end', ['disabled' => true, 'id' => 'dayEnd', 'class' => 'form-control']);
                            echo $this->Form->control('cashin', ['disabled' => true, 'id' => 'cashin', 'class' => 'form-control']);
                            echo $this->Form->control('cashout', ['disabled' => true, 'id' => 'cashout', 'class' => 'form-control']);
                            echo $this->Form->control('bet', ['disabled' => true, 'id' => 'bet', 'class' => 'form-control']);
                            echo $this->Form->control('win', ['disabled' => true, 'id' => 'win', 'class' => 'form-control']);
                            echo $this->Form->control('jackpot', ['disabled' => true, 'id' => 'jackpot', 'class' => 'form-control']);
                            echo $this->Form->control('gamesplayed', ['disabled' => true, 'id' => 'gamesplayed', 'class' => 'form-control']); 
                        ?>
                        </div>
                        <div class="col">
                            <?php echo $this->Form->control('image', ['type' => 'file', 'required' => 'true', 'id' => 'image']);?>
                            <img id="file">
                        </div>
                    </div>
                </fieldset>
                <?= $this->Form->button(__('Submit')) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>

    </div>

    <div class="col">
      
        <?php if(!empty($casino->machines)): ?>
            <table class="table-responsive">
                <tr>
                    <th><?= __('Id') ?></th>
                    <th><?= __('Serial') ?></th>
                    <th><?= __('Nombre') ?></th>
                    <th><?= __('Casino') ?></th>
                    <th><?= __('Tipo de Contrato') ?></th>
                </tr>
                <?php foreach($casino->machines as $machine): ?>
                <tr>
                    <td><?= h($machine->id) ?></td>
                    <td><?= h($machine->serial) ?></td>
                    <td><?= h($machine->name) ?></td>
                    <td><?= h($casino->name) ?></td>
                    <td><?= h($machine->contract_id) ?></td>
                </tr>
                <?php endforeach ?>
            </table>
        <?php endif; ?>

    </div>
  </div>
</div>




<div class="container">


<div class="row">
  
  <div class="row">
    
    <div class="col">

            <div class="row">

                
            </div>

    </div>
    <div class="col">
    
                    
<div class="accountants index content">
    <h3><?= __('Contadores del mes Anterior') ?></h3>
    <div class="table-responsive">
        <table class="table table-responsive table-striped table-bordered text-center">
            <thead class="thead-dark">
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('machine_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('day_init') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('day_end') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('month') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('year') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('cashin') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('cashout') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('bet') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('win') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('profit') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('jackpot') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('gamesplayed') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('coljuegos') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('admin') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('total') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('alfastreet') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('image') ?></th>

                </tr>
            </thead>
            <tbody>
                <?php 

                foreach ($lastaccountants as $lastaccountant): ?>

                <tr>
                    <td scope="row"><?= $this->Number->format($lastaccountant->id) ?></td>
                    <td><?= h($lastaccountant->machine_id) ?></td>
                    <td><?= h($lastaccountant->day_init) ?></td>
                    <td><?= h($lastaccountant->day_end) ?></td>
                    <td><?= h($lastaccountant->month_id) ?></td>
                    <td><?= h($lastaccountant->year) ?></td>
                    <td><?= $this->Number->currency($lastaccountant->cashin, 'USD') ?></td>
                    <td><?= $this->Number->currency($lastaccountant->cashout, 'USD') ?></td>
                    <td><?= $this->Number->currency($lastaccountant->bet, 'USD') ?></td>
                    <td><?= $this->Number->currency($lastaccountant->win, 'USD') ?></td>
                    <td><?= $this->Number->currency($lastaccountant->profit, 'USD') ?></td>
                    <td><?= $this->Number->currency($lastaccountant->jackpot, 'USD') ?></td>
                    <td><?= h($lastaccountant->gamesplayed) ?></td>
                    <td><?= $this->Number->currency($lastaccountant->coljuegos, 'USD') ?></td>
                    <td><?= $this->Number->currency($lastaccountant->admin, 'USD') ?></td>
                    <td><?= $this->Number->currency($lastaccountant->total, 'USD') ?></td>
                    <td><?= $this->Number->currency($lastaccountant->alfastreet, 'USD') ?></td>
                    <td><?= $this->Html->image('Accountants/'.$lastaccountant->image) ?></td>
                </tr> 
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
    
</div>


<div class="accountants index content">
    <h3><?= __('Contadores del mes Actual') ?></h3>
    <div class="table-responsive">
        <table class="table table-responsive table-striped table-bordered text-center">
            <thead class="thead-dark">
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('machine_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('day_init') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('day_end') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('month') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('year') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('cashin') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('cashout') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('bet') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('win') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('profit') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('jackpot') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('gamesplayed') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('coljuegos') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('admin') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('total') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('alfastreet') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('image') ?></th>

                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($accountants as $accountant): ?>

                <tr>
                    <td scope="row"><?= $this->Number->format($accountant->id) ?></td>
                    <td><?= h($accountant->machine_id) ?></td>
                    <td><?= h($accountant->day_init) ?></td>
                    <td><?= h($accountant->day_end) ?></td>
                    <td><?= h($accountant->month_id) ?></td>
                    <td><?= h($accountant->year) ?></td>
                    <td><?= $this->Number->currency($accountant->cashin, 'USD') ?></td>
                    <td><?= $this->Number->currency($accountant->cashout, 'USD') ?></td>
                    <td><?= $this->Number->currency($accountant->bet, 'USD') ?></td>
                    <td><?= $this->Number->currency($accountant->win, 'USD') ?></td>
                    <td><?= $this->Number->currency($accountant->profit, 'USD') ?></td>
                    <td><?= $this->Number->currency($accountant->jackpot, 'USD') ?></td>
                    <td><?= h($accountant->gamesplayed) ?></td>
                    <td><?= $this->Number->currency($accountant->coljuegos, 'USD') ?></td>
                    <td><?= $this->Number->currency($accountant->admin, 'USD') ?></td>
                    <td><?= $this->Number->currency($accountant->total, 'USD') ?></td>
                    <td><?= $this->Number->currency($accountant->alfastreet, 'USD') ?></td>
                    <td><?= $this->Html->image('Accountants/'.$accountant->image) ?></td>
                </tr>       
                <?php endforeach; ?>
            </tbody>
        </table>


    </div>
    
</div>



<div class="accountants index content">
    <h3><?= __('Liquidación Actual') ?></h3>
    <div class="table-responsive">
        <table class="table table-responsive table-striped table-bordered text-center">
            <thead class="thead-dark">
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('machine_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('day_init') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('day_end') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('month') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('year') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('cashin') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('cashout') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('bet') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('win') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('profit') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('jackpot') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('gamesplayed') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('total') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('alfastreet') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php  $total = 0;
                $totalizate = 0;
                
                foreach ($accountants as $accountant):
                    foreach($lastaccountants as $lastaccountant) :
                        $totalCashin = 0;
                        $totalCashout = 0;
                        $totalBet = 0;
                        $totalWin = 0;
                        $totalProfit = 0;
                        $totalJackpot = 0;
                        $totalizate = 0;
                        $alfasteet = 0;

                        if($lastaccountant->machine_id === $accountant->machine_id){
                            $totalCashin = $accountant->cashin - $lastaccountant->cashin;
                            $totalCashout =  $accountant->cashout - $lastaccountant->cashout;
                            $totalBet = $accountant->bet - $lastaccountant->bet;
                            $totalWin = $accountant->win - $lastaccountant->win;
                            $totalProfit = $accountant->profit - $lastaccountant->profit;
                            $totalJackpot = $accountant->jackpot - $lastaccountant->jackpot;
                            $totalizate = $accountant->profit - $lastaccountant->profit;
                            $alfasteet = $totalizate * 0.40; 
                                                     
                            ?>

                <tr>
                    <td><?= h($accountant->machine_id) ?></td>
                    <td><?= h($accountant->day_init) ?></td>
                    <td><?= h($accountant->day_end) ?></td>
                    <td><?= h($accountant->month_id) ?></td>
                    <td><?= h($accountant->year) ?></td>
                    <td><?= $this->Number->currency($totalCashin, 'USD') ?></td>
                    <td><?= $this->Number->currency($totalCashout, 'USD') ?></td>
                    <td><?= $this->Number->currency($totalBet, 'USD') ?></td>
                    <td><?= $this->Number->currency($totalWin, 'USD') ?></td>
                    <td><?= $this->Number->currency($totalProfit, 'USD') ?></td>
                    <td><?= $this->Number->currency($totalJackpot, 'USD') ?></td>
                    <td><?= h($accountant->gamesplayed) ?></td>
                    <td><?= $this->Number->currency($totalizate, 'USD' ) ?></td>
                    <td><?= $this->Number->currency($alfasteet, 'USD') ?></td>
                </tr> 

                <?php } 
                    $total += $alfasteet;
                    endforeach;
            endforeach; ?>
            </tbody>
        </table>

        <div class="total">
            <h3>Total a pagar en el mes: <span><?= $this->Number->currency($total, 'USD') ?></span></h3>
        </div>

    </div>
    
</div>


<?= $this->Html->Script('accounts') ?>

