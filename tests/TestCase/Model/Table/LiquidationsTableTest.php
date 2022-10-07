<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LiquidationsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LiquidationsTable Test Case
 */
class LiquidationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LiquidationsTable
     */
    protected $Liquidations;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Liquidations',
        'app.Casinos',
        'app.Machines',
        'app.Months',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Liquidations') ? [] : ['className' => LiquidationsTable::class];
        $this->Liquidations = $this->getTableLocator()->get('Liquidations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Liquidations);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\LiquidationsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\LiquidationsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
