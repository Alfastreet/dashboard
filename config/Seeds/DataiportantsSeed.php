<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Dataiportants seed.
 */
class DataiportantsSeed extends AbstractSeed
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
                'data' => 'Iva Participaciones',
                'value' => '144415'
            ],
            [
                'data' => 'Porcentaje Coljuegos',
                'value' => '0.12',
            ],
            [
                'data' => 'Porcentaje Administracion',
                'value' => '0.01',
            ],
            [
                'data' => 'Porcentaje Participacion Alfastreet', 
                'value' => '0.40',
            ],
            [
                'data' => 'Comp Financiero', 
                'value' => '0.39',
            ],
        ];

        $table = $this->table('dataiportants');
        $table->insert($data)->save();
    }
}
