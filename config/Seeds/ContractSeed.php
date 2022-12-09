<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Contract seed.
 */
class ContractSeed extends AbstractSeed
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
            ['name' => 'Venta'],
            ['name' => 'Participacion'],
            ['name' => 'Sin Contrato'],
        ];

        $table = $this->table('contract');
        $table->insert($data)->save();
    }
}
