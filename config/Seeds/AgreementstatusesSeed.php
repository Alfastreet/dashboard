<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Agreementstatuses seed.
 */
class AgreementstatusesSeed extends AbstractSeed
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
                'status' => 'Firmado'
            ],
            [
                'status' => 'En espera'
            ],
            [
                'status' => 'Cancelado'
            ]
        ];

        $table = $this->table('agreementstatuses');
        $table->insert($data)->save();
    }
}
