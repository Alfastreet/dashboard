<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TiketsFixture
 */
class TiketsFixture extends TestFixture
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
                'machine_id' => 1,
                'email' => 'Lorem ipsum dolor sit amet',
                'phone' => 'Lorem ipsum dolor sit amet',
                'comments' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'datecreate' => '2022-10-28',
                'status' => 'Lorem ipsum dolor sit amet',
                'resolved' => 'Lorem ipsum dolor sit amet',
                'support_id' => 1,
                'name_client' => 'Lorem ipsum dolor sit amet',
                'user_id' => 1,
                'dateresolved' => '2022-10-28',
            ],
        ];
        parent::init();
    }
}
