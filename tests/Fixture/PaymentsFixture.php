<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PaymentsFixture
 */
class PaymentsFixture extends TestFixture
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
                'paymentquote' => 'Lorem ipsum dolor sit amet',
                'valuequote' => 'Lorem ipsum dolor sit amet',
                'datepayment' => '2022-11-15',
                'destiny_id' => 1,
                'bank_id' => 1,
                'cop' => 'Lorem ipsum dolor sit amet',
                'trm' => 'Lorem ipsum dolor sit amet',
                'referencepay' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
