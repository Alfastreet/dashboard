<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LiquidationTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LiquidationTable Test Case
 */
class LiquidationTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LiquidationTable
     */
    protected $Liquidation;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Liquidation',
        'app.Accountants',
        'app.Accountantsstatuses',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Liquidation') ? [] : ['className' => LiquidationTable::class];
        $this->Liquidation = $this->getTableLocator()->get('Liquidation', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Liquidation);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\LiquidationTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\LiquidationTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
