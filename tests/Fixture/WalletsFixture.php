<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * WalletsFixture
 */
class WalletsFixture extends TestFixture
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
                'agreement_id' => 1,
                'payment' => 'Lorem ipsum dolor sit amet',
                'collection' => 'Lorem ipsum dolor sit amet',
                'lastpay' => '2022-11-09',
                'quotemora' => 'Lorem ipsum dolor sit amet',
                'mora' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
