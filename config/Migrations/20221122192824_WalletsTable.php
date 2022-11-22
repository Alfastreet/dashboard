<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class WalletsTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('wallets');

        $table->addColumn('agreement_id', 'integer')
        ->addColumn('payment', 'string')
        ->addColumn('collection', 'string')
        ->addColumn('lastpay', 'date')
        ->addColumn('quotemora', 'string')
        ->addColumn('mora', 'string')
        ->create();
    }
}
