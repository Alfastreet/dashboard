<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InstallmentsFixture
 */
class InstallmentsFixture extends TestFixture
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
                'dateinstallment' => '2022-11-21',
                'guide' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
