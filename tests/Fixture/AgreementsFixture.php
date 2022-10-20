<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AgreementsFixture
 */
class AgreementsFixture extends TestFixture
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
                'client_id' => 1,
                'business_id' => 1,
                'machine_id' => 1,
                'discount' => 'Lorem ipsum dolor sit amet',
                'agreementvalue' => 'Lorem ipsum dolor sit amet',
                'nquote' => 'Lorem ipsum dolor sit amet',
                'quoteini' => 'Lorem ipsum dolor sit amet',
                'separation' => 'Lorem ipsum dolor sit amet',
                'agreementstatus_id' => 1,
                'datesigned' => '2022-10-18',
                'comments' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            ],
        ];
        parent::init();
    }
}
