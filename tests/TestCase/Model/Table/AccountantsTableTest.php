<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AccountantsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AccountantsTable Test Case
 */
class AccountantsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AccountantsTable
     */
    protected $Accountants;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Accountants',
        'app.Machines',
        'app.Casinos',
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
        $config = $this->getTableLocator()->exists('Accountants') ? [] : ['className' => AccountantsTable::class];
        $this->Accountants = $this->getTableLocator()->get('Accountants', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Accountants);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AccountantsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\AccountantsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
