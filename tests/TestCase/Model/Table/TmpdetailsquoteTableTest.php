<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TmpdetailsquoteTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TmpdetailsquoteTable Test Case
 */
class TmpdetailsquoteTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TmpdetailsquoteTable
     */
    protected $Tmpdetailsquote;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Tmpdetailsquote',
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
        $config = $this->getTableLocator()->exists('Tmpdetailsquote') ? [] : ['className' => TmpdetailsquoteTable::class];
        $this->Tmpdetailsquote = $this->getTableLocator()->get('Tmpdetailsquote', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Tmpdetailsquote);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TmpdetailsquoteTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\TmpdetailsquoteTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
