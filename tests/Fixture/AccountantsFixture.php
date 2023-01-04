<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AccountantsFixture
 */
class AccountantsFixture extends TestFixture
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
                'machine_id' => 1,
                'casino_id' => 1,
                'day_init' => '2023-01-04',
                'day_end' => '2023-01-04',
                'month_id' => 1,
                'year' => 'Lorem ipsum dolor sit amet',
                'cashin' => 'Lorem ipsum dolor sit amet',
                'cashout' => 'Lorem ipsum dolor sit amet',
                'bet' => 'Lorem ipsum dolor sit amet',
                'win' => 'Lorem ipsum dolor sit amet',
                'profit' => 'Lorem ipsum dolor sit amet',
                'jackpot' => 'Lorem ipsum dolor sit amet',
                'gamesplayed' => 'Lorem ipsum dolor sit amet',
                'coljuegos' => 'Lorem ipsum dolor sit amet',
                'admin' => 'Lorem ipsum dolor sit amet',
                'total' => 'Lorem ipsum dolor sit amet',
                'alfastreet' => 'Lorem ipsum dolor sit amet',
                'image' => 'Lorem ipsum dolor sit amet',
                'totaldays' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
