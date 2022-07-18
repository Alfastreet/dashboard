<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MachinesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MachinesTable Test Case
 */
class MachinesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MachinesTable
     */
    protected $Machines;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Machines',
        'app.Models',
        'app.Makers',
        'app.Casinos',
        'app.Owners',
        'app.Companies',
        'app.Machinepart',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Machines') ? [] : ['className' => MachinesTable::class];
        $this->Machines = $this->getTableLocator()->get('Machines', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Machines);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\MachinesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\MachinesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
