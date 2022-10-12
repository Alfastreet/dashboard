<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrdersFixture
 */
class OrdersFixture extends TestFixture
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
                'order_id' => 1,
                'quote_id' => 1,
                'user_id' => 1,
                'client_id' => 1,
                'comments' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'orderstatus_id' => 1,
                'machine_id' => 1,
                'x2max' => 'Lorem ipsum dolor sit amet',
                'x3max' => 'Lorem ipsum dolor sit amet',
                'x6max' => 'Lorem ipsum dolor sit amet',
                'x7max' => 'Lorem ipsum dolor sit amet',
                'x9max' => 'Lorem ipsum dolor sit amet',
                'x12max' => 'Lorem ipsum dolor sit amet',
                'x18max' => 'Lorem ipsum dolor sit amet',
                'x36max' => 'Lorem ipsum dolor sit amet',
                'exteriormax' => 'Lorem ipsum dolor sit amet',
                'interiormax' => 'Lorem ipsum dolor sit amet',
                'totalmax' => 'Lorem ipsum dolor sit amet',
                'x2min' => 'Lorem ipsum dolor sit amet',
                'x3min' => 'Lorem ipsum dolor sit amet',
                'x6min' => 'Lorem ipsum dolor sit amet',
                'x7min' => 'Lorem ipsum dolor sit amet',
                'x9min' => 'Lorem ipsum dolor sit amet',
                'x12min' => 'Lorem ipsum dolor sit amet',
                'x18min' => 'Lorem ipsum dolor sit amet',
                'x36min' => 'Lorem ipsum dolor sit amet',
                'exteriormin' => 'Lorem ipsum dolor sit amet',
                'interiormin' => 'Lorem ipsum dolor sit amet',
                'totalmin' => 'Lorem ipsum dolor sit amet',
                'limitmax' => 'Lorem ipsum dolor sit amet',
                'apuestamin' => 'Lorem ipsum dolor sit amet',
                'fecuenciafin' => 'Lorem ipsum dolor sit amet',
                'frecuenciaini' => 'Lorem ipsum dolor sit amet',
                'hiddenper' => 'Lorem ipsum dolor sit amet',
                'apuestaper' => 'Lorem ipsum dolor sit amet',
                'timeapuesta' => 'Lorem ipsum dolor sit amet',
                'contrasoplado' => 'Lorem ipsum dolor sit amet',
                'soplado' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
