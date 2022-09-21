<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MonthFixture
 */
class MonthFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'month';
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
                'month' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
