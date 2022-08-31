<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LiquidationFixture
 */
class LiquidationFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'liquidation';
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
                'accountants_id' => 1,
                'total' => 'Lorem ipsum dolor sit amet',
                'accountantsstatus_id' => 1,
            ],
        ];
        parent::init();
    }
}
