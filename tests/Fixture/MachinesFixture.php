<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MachinesFixture
 */
class MachinesFixture extends TestFixture
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
                'idint' => 1,
                'serial' => 'Lorem ipsum dolor sit amet',
                'name' => 'Lorem ipsum dolor sit amet',
                'yearModel' => 1,
                'model_id' => 1,
                'maker_id' => 1,
                'warranty' => 'Lorem ipsum dolor sit amet',
                'image' => 'Lorem ipsum dolor sit amet',
                'height' => 'Lorem ipsum dolor sit amet',
                'width' => 'Lorem ipsum dolor sit amet',
                'display' => 'Lorem ipsum dolor sit amet',
                'dateInstalling' => '2022-10-18 13:45:49',
                'casino_id' => 1,
                'owner_id' => 1,
                'company_id' => 1,
                'contract_id' => 1,
                'cheked' => 1,
                'value' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
