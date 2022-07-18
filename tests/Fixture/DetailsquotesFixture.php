<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DetailsquotesFixture
 */
class DetailsquotesFixture extends TestFixture
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
                'quote_id' => 1,
                'typeProduct_id' => 1,
                'product_id' => 1,
                'amount' => 1,
                'value' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
