<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StateTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StateTable Test Case
 */
class StateTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StateTable
     */
    protected $State;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.State',
        'app.Casinos',
        'app.City',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('State') ? [] : ['className' => StateTable::class];
        $this->State = $this->getTableLocator()->get('State', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->State);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\StateTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
