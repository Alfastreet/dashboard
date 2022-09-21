<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OwnerFixture
 */
class OwnerFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'owner';
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
                'phone' => 1,
                'address' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
