<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MoniesFixture
 */
class MoniesFixture extends TestFixture
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
                'shortcode' => 'Lorem ipsum dolor ',
                'value' => 'Lorem ip',
                'urlData' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
