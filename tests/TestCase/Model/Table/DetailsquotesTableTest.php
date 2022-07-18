<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DetailsquotesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DetailsquotesTable Test Case
 */
class DetailsquotesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DetailsquotesTable
     */
    protected $Detailsquotes;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Detailsquotes',
        'app.Quotes',
        'app.TypeProducts',
        'app.Products',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Detailsquotes') ? [] : ['className' => DetailsquotesTable::class];
        $this->Detailsquotes = $this->getTableLocator()->get('Detailsquotes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Detailsquotes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\DetailsquotesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\DetailsquotesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
