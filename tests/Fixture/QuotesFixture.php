<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * QuotesFixture
 */
class QuotesFixture extends TestFixture
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
                'user_id' => 1,
                'business_id' => 1,
                'date' => '2022-07-15 14:25:24',
                'total' => 'Lorem ipsum dolor sit amet',
                'estatus_id' => 1,
            ],
        ];
        parent::init();
    }
}
