<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OwnercompanyFixture
 */
class OwnercompanyFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'ownercompany';
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
                'owner_id' => 1,
                'company_id' => 1,
            ],
        ];
        parent::init();
    }
}
