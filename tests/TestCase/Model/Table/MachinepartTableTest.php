<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MachinepartTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MachinepartTable Test Case
 */
class MachinepartTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MachinepartTable
     */
    protected $Machinepart;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Machinepart',
        'app.Machines',
        'app.Parts',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Machinepart') ? [] : ['className' => MachinepartTable::class];
        $this->Machinepart = $this->getTableLocator()->get('Machinepart', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Machinepart);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\MachinepartTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\MachinepartTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
