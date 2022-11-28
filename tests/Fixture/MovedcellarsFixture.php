<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MovedcellarsFixture
 */
class MovedcellarsFixture extends TestFixture
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
                'cellar_id' => 1,
                'part_id' => 1,
                'amount' => 'Lorem ipsum dolor sit amet',
                'datemoved' => '2022-11-28',
            ],
        ];
        parent::init();
    }
}
