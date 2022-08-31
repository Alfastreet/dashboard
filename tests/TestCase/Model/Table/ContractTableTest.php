<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ContractTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ContractTable Test Case
 */
class ContractTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ContractTable
     */
    protected $Contract;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Contract',
        'app.Machines',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Contract') ? [] : ['className' => ContractTable::class];
        $this->Contract = $this->getTableLocator()->get('Contract', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Contract);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ContractTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
