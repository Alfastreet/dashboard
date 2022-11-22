<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class EstimatedsTable extends AbstractMigration
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
        $table = $this->table('estimateds');

        $table->addColumn('agreement_id', 'integer')
        ->addColumn('quotevalue', 'string')
        ->addColumn('nquote', 'string')
        ->addColumn('dateend', 'date', [
            'default' => null,
            'null' => true
        ])
        ->addColumn('dateinit', 'date', [
            'default' => null,
            'null' => true
        ])
        ->create();
    }
}
