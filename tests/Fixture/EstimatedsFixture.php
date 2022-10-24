<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EstimatedsFixture
 */
class EstimatedsFixture extends TestFixture
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
                'quotevalue' => 'Lorem ipsum dolor sit amet',
                'nquote' => 'Lorem ipsum dolor sit amet',
                'dateend' => '2022-10-24',
                'dateinit' => '2022-10-24',
            ],
        ];
        parent::init();
    }
}
