<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Supports seed.
 */
class SupportsSeed extends AbstractSeed
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
            ['name' => 'Soporte Tecnico'],
            ['name' => 'Soporte Comercial'],
            ['name' => 'Ventas'],
            ['name' => 'Cartera'],
            ['name' => 'Otros'],
        ];

        $table = $this->table('supports');
        $table->insert($data)->save();
    }
}
