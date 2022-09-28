<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QuotestatusesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QuotestatusesTable Test Case
 */
class QuotestatusesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\QuotestatusesTable
     */
    protected $Quotestatuses;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Quotestatuses',
        'app.Quotes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Quotestatuses') ? [] : ['className' => QuotestatusesTable::class];
        $this->Quotestatuses = $this->getTableLocator()->get('Quotestatuses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Quotestatuses);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\QuotestatusesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\QuotestatusesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
