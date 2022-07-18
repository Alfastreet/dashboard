<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MoneyTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MoneyTable Test Case
 */
class MoneyTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MoneyTable
     */
    protected $Money;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Money',
        'app.Parts',
        'app.Services',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Money') ? [] : ['className' => MoneyTable::class];
        $this->Money = $this->getTableLocator()->get('Money', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Money);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\MoneyTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
