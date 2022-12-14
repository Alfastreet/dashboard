<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MoneyFixture
 */
class MoneyFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'money';
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
                'urlData' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
