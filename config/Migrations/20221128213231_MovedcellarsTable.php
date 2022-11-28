<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class MovedcellarsTable extends AbstractMigration
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
        $table = $this->table('movedcellars');

        $table->addColumn('cellar_id', 'integer')
        ->addColumn('part_id', 'integer')
        ->addColumn('amount', 'string')
        ->addColumn('datemoved', 'date')
        ->create();
    }
}
