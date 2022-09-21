<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CasinosFixture
 */
class CasinosFixture extends TestFixture
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
                'name' => 'Lorem ipsum dolor sit amet',
                'phone' => 1,
                'address' => 'Lorem ipsum dolor sit amet',
                'city_id' => 1,
                'state_id' => 1,
                'owner_id' => 1,
                'company_id' => 1,
                'image' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
