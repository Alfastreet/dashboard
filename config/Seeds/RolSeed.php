<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Rol seed.
 */
class RolSeed extends AbstractSeed
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
            ['rol' => 'Superadministrador'],
            ['rol' => 'Administrador'],
            ['rol' => 'Tecnico Jefe'],
            ['rol' => 'Tecnico'],
            ['rol' => 'Contador'],
            ['rol' => 'Usuario'],
        ];

        $table = $this->table('rol');
        $table->insert($data)->save();
    }
}
