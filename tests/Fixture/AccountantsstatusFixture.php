<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AccountantsstatusFixture
 */
class AccountantsstatusFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'accountantsstatus';
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
                'status' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
