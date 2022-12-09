<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * City seed.
 */
class CitySeed extends AbstractSeed
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
            [
                'name' => 'Bogota D.C',
                'state_id' => 1
            ]
        ];

        $table = $this->table('city');
        $table->insert($data)->save();
    }
}
