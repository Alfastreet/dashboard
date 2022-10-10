<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MoniesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MoniesTable Test Case
 */
class MoniesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MoniesTable
     */
    protected $Monies;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Monies',
        'app.Detailsquotes',
        'app.Parts',
        'app.Services',
        'app.Tmpdetailsquote',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Monies') ? [] : ['className' => MoniesTable::class];
        $this->Monies = $this->getTableLocator()->get('Monies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Monies);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\MoniesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
