<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StateFixture
 */
class StateFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'state';
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
                'name' => 1,
            ],
        ];
        parent::init();
    }
}
