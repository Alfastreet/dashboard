<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LiquidationsFixture
 */
class LiquidationsFixture extends TestFixture
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
                'machine_id' => 1,
                'month_id' => 1,
                'year' => 1,
                'cashin' => 'Lorem ipsum dolor sit amet',
                'cashout' => 'Lorem ipsum dolor sit amet',
                'bet' => 'Lorem ipsum dolor sit amet',
                'win' => 'Lorem ipsum dolor sit amet',
                'profit' => 'Lorem ipsum dolor sit amet',
                'jackpot' => 'Lorem ipsum dolor sit amet',
                'games' => 'Lorem ipsum dolor sit amet',
                'coljuegos' => 'Lorem ipsum dolor sit amet',
                'admin' => 'Lorem ipsum dolor sit amet',
                'total' => 'Lorem ipsum dolor sit amet',
                'alfastreet' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
