<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DetailsaccountantsFixture
 */
class DetailsaccountantsFixture extends TestFixture
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
                'ID' => 1,
                'total_bet' => 'Lorem ipsum dolor sit amet',
                'total_cash_in' => 'Lorem ipsum dolor sit amet',
                'total_cash_out' => 'Lorem ipsum dolor sit amet',
                'jackpot' => 'Lorem ipsum dolor sit amet',
                'total_bill_drop' => 'Lorem ipsum dolor sit amet',
                'cancel_credits' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
