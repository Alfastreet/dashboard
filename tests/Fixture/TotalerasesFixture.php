<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TotalerasesFixture
 */
class TotalerasesFixture extends TestFixture
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
                'casino_id' => 1,
                'month_id' => 1,
                'year' => 'Lorem ipsum dolor sit amet',
                'total' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
