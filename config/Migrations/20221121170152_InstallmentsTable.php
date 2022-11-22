<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class InstallmentsTable extends AbstractMigration
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
        $table = $this->table('installments');
        $table->addColumn('quote_id', 'integer')
        ->addColumn('dateinstallment', 'date')
        ->addColumn('guide', 'string')
        ->create();
    }
}
