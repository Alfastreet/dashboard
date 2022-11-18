<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TotalaccountantsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TotalaccountantsTable Test Case
 */
class TotalaccountantsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TotalaccountantsTable
     */
    protected $Totalaccountants;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Totalaccountants',
        'app.Casinos',
        'app.Month',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Totalaccountants') ? [] : ['className' => TotalaccountantsTable::class];
        $this->Totalaccountants = $this->getTableLocator()->get('Totalaccountants', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Totalaccountants);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TotalaccountantsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\TotalaccountantsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
