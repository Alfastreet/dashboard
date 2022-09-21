<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RolFixture
 */
class RolFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'rol';
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
                'rol' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
