<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ContractFixture
 */
class ContractFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'contract';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'typecontract' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
