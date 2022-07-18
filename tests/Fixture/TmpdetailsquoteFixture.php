<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TmpdetailsquoteFixture
 */
class TmpdetailsquoteFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'tmpdetailsquote';
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
                'typeProduct_id' => 1,
                'product_id' => 1,
                'amount' => 1,
                'value' => 'Lorem ipsum dolor sit amet',
                'token' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
