<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Orderstatus seed.
 */
class OrderstatusSeed extends AbstractSeed
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
            ['status' => 'Completada'],
            ['status' => 'Pendiente'],
            ['status' => 'Cancelada'],
        ];

        $table = $this->table('orderstatuses');
        $table->insert($data)->save();
    }
}
