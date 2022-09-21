<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MonthTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MonthTable Test Case
 */
class MonthTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MonthTable
     */
    protected $Month;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
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
        $config = $this->getTableLocator()->exists('Month') ? [] : ['className' => MonthTable::class];
        $this->Month = $this->getTableLocator()->get('Month', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Month);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\MonthTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
