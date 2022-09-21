<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
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
                'name' => 'Lorem ipsum dolor sit amet',
                'lastName' => 'Lorem ipsum dolor sit amet',
                'address' => 'Lorem ipsum dolor sit amet',
                'phone' => 1,
                'identification' => 1,
                'email' => 'Lorem ipsum dolor sit amet',
                'password' => '',
                'token' => 'Lorem ipsum dolor sit amet',
                'rol_id' => 1,
                'checked' => 1,
                'image' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
