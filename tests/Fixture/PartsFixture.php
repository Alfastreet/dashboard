<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PartsFixture
 */
class PartsFixture extends TestFixture
{
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
                'serial' => 'Lorem ipsum dolor sit amet',
                'name' => 'Lorem ipsum dolor sit amet',
                'money_id' => 1,
                'value' => 1,
                'amount' => 1,
                'image' => 'Lorem ipsum dolor sit amet',
                'typeproduct_id' => 1,
                'cellar_id' => 1,
            ],
        ];
        parent::init();
    }
}
