<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class UsersTable extends AbstractMigration
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
        $table = $this->table('users');

        $table->addColumn('name', 'string')
        ->addColumn('lastName', 'string')
        ->addColumn('address', 'string')
        ->addColumn('phone', 'string')
        ->addColumn('identification', 'string')
        ->addColumn('email', 'string')
        ->addColumn('password', 'string')
        ->addColumn('token', 'string')
        ->addColumn('rol_id', 'integer')
        ->addColumn('checked', 'integer')
        ->addColumn('image', 'string')
        ->addIndex('email', ['unique' => true])
        ->create();
    }
}
