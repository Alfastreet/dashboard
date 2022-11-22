<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class AgreementsTable extends AbstractMigration
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
        $table = $this->table('agreements');

        $table->addColumn('client_id', 'integer')
        ->addColumn('business_id', 'integer')
        ->addColumn('machine_id', 'integer')
        ->addColumn('discount', 'string')
        ->addColumn('agreementvalue', 'string')
        ->addColumn('nquote', 'string')
        ->addColumn('quoteini', 'string')
        ->addColumn('separation', 'string')
        ->addColumn('agreementstatus_id', 'integer')
        ->addColumn('datesigned', 'date', [
            'default' => null,
            'null' => true,
        ])
        ->addColumn('comments', 'text')
        ->addColumn('percentinicial', 'string', [
            'default' => null,
            'null' => true
        ])
        ->addColumn('quotevalue', 'string', [
            'default' => null,
            'null' => true,
        ])
        ->create();
    }
}
