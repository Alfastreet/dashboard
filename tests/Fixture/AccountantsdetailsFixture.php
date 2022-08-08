<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AccountantsdetailsFixture
 */
class AccountantsdetailsFixture extends TestFixture
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
                'accountants_id' => 1,
                'details_id' => 1,
            ],
        ];
        parent::init();
    }
}
