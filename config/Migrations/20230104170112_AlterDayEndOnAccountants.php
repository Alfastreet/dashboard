<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class AlterDayEndOnAccountants extends AbstractMigration
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
        $table = $this->table('accountants');
        $table->changeColumn('day_end', 'date', [
            'default' => null,
            'null' => false,
        ]);
        $table->update();
    }
}
