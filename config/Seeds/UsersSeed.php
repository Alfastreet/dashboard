<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
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
            'name' => 'Nicolas',
            'lastName' => 'Cuadros',
            'address' => 'Carrera 70C #50-08',
            'phone' => '3132803746',
            'identification' => '1010020349',
            'email' => 'ingenieria@alfastreet.co',
            'password' => '123456',
            'token' => '123456',
            'rol_id' => 1,
            'checked' => '1',
            'image' => 'nuled'
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
