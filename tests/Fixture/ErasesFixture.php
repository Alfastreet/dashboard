<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ErasesFixture
 */
class ErasesFixture extends TestFixture
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
                'details_id' => 1,
                'image' => 'Lorem ipsum dolor sit amet',
                'alfastreet' => 'Lorem ipsum dolor sit amet',
                'total' => 'Lorem ipsum dolor sit amet',
                'admin' => 'Lorem ipsum dolor sit amet',
                'coljuegos' => 'Lorem ipsum dolor sit amet',
                'gamesplayed' => 'Lorem ipsum dolor sit amet',
                'jackpot' => 'Lorem ipsum dolor sit amet',
                'profit' => 'Lorem ipsum dolor sit amet',
                'win' => 'Lorem ipsum dolor sit amet',
                'bet' => 'Lorem ipsum dolor sit amet',
                'cashout' => 'Lorem ipsum dolor sit amet',
                'cashin' => 'Lorem ipsum dolor sit amet',
                'year' => 'Lorem ipsum dolor sit amet',
                'month_id' => 1,
                'day_end' => 'Lorem ipsum dolor sit amet',
                'day_init' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
