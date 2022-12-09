<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Cellar seed.
 */
class CellarSeed extends AbstractSeed
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
                'name' => 'Principal',
                'description' => 'Bodega principal del inventario, donde estan todos los items listos para la venta'
            ],
            [
                'name' => 'Laboratiorio',
                'description' => 'Bodega donde se almacenan los items en mantenimiento',
            ],
            [
                'name' => 'Repuestos',
                'description' => 'Bodega donde se almacenan las partes para repuestos necesarios en laboratorio',
            ],
            [
                'name' => 'Baja o Chatarra',
                'description' => 'Bodega de items de baja'
            ]
        ];

        $table = $this->table('cellars');
        $table->insert($data)->save();
    }
}
