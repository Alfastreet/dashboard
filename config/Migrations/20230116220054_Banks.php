<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class Banks extends AbstractMigration
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
        $table = $this->table('banks');
        $table->addColumn('numerocuenta', 'string', [
            'limit' => 255,
            'null' => false
        ])
        ->addColumn('razonsocial', 'string', [
            'limit' => 255,
            'null' => false
        ])
        ->create();
    }
}
