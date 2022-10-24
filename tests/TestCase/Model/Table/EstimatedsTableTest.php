<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EstimatedsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EstimatedsTable Test Case
 */
class EstimatedsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EstimatedsTable
     */
    protected $Estimateds;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Estimateds',
        'app.Agreements',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Estimateds') ? [] : ['className' => EstimatedsTable::class];
        $this->Estimateds = $this->getTableLocator()->get('Estimateds', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Estimateds);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\EstimatedsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\EstimatedsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
