<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ClientFixture
 */
class ClientFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'client';
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
                'email' => 'Lorem ipsum dolor sit amet',
                'position_id' => 1,
                'business_id' => 1,
            ],
        ];
        parent::init();
    }
}
