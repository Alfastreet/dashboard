<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrderstatusesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OrderstatusesTable Test Case
 */
class OrderstatusesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OrderstatusesTable
     */
    protected $Orderstatuses;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Orderstatuses',
        'app.Orders',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Orderstatuses') ? [] : ['className' => OrderstatusesTable::class];
        $this->Orderstatuses = $this->getTableLocator()->get('Orderstatuses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Orderstatuses);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\OrderstatusesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
