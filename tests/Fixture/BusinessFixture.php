<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BusinessFixture
 */
class BusinessFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'business';
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
                'nit' => 1,
                'phone' => 1,
                'address' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'owner_id' => 1,
            ],
        ];
        parent::init();
    }
}
