<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AccountantsdetailsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AccountantsdetailsTable Test Case
 */
class AccountantsdetailsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AccountantsdetailsTable
     */
    protected $Accountantsdetails;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Accountantsdetails',
        'app.Accountants',
        'app.Details',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Accountantsdetails') ? [] : ['className' => AccountantsdetailsTable::class];
        $this->Accountantsdetails = $this->getTableLocator()->get('Accountantsdetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Accountantsdetails);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AccountantsdetailsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\AccountantsdetailsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
