<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CityFixture
 */
class CityFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'city';
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
                'name' => 'Lorem ipsum dolor sit amet',
                'state_id' => 1,
            ],
        ];
        parent::init();
    }
}
