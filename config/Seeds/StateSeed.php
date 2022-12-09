<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * State seed.
 */
class StateSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Bogota D.C'],
        ];

        $table = $this->table('state');
        $table->insert($data)->save();
    }
}
