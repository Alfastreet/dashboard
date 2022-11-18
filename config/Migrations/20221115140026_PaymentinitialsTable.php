<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class PaymentinitialsTable extends AbstractMigration
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
        $table = $this->table('paymentinitials');
        $table->addColumn('agreement_id', 'integer')
        ->addColumn('valuequote', 'string')
        ->addColumn('datepayment', 'date')
        ->addColumn('trm', 'string')
        ->addColumn('cop', 'string')
        ->addColumn('destiny_id', 'integer')
        ->addColumn('bank', 'string')
        ->addColumn('referencepay', 'string')
        ->create();
    }
}
