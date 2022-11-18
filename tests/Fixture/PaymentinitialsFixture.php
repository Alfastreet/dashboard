<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PaymentinitialsFixture
 */
class PaymentinitialsFixture extends TestFixture
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
                'valuequote' => 'Lorem ipsum dolor sit amet',
                'datepayment' => '2022-11-15',
                'trm' => 'Lorem ipsum dolor sit amet',
                'cop' => 'Lorem ipsum dolor sit amet',
                'destiny_id' => 1,
                'bank_id' => 1,
                'referencepay' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
