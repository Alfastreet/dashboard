<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CellarsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CellarsTable Test Case
 */
class CellarsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CellarsTable
     */
    protected $Cellars;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Cellars',
        'app.Parts',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Cellars') ? [] : ['className' => CellarsTable::class];
        $this->Cellars = $this->getTableLocator()->get('Cellars', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Cellars);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CellarsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
