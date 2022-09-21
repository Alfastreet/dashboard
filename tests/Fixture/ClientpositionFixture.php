<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ClientpositionFixture
 */
class ClientpositionFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'clientposition';
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
                'position' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
