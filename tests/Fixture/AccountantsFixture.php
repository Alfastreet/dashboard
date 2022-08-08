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
                'date_init' => '2022-07-22',
                'date_end' => '2022-07-22',
                'total_win' => 'Lorem ipsum dolor sit amet',
                'status_count_id' => 1,
            ],
        ];
        parent::init();
    }
}
