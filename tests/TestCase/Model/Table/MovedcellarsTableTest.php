<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MovedcellarsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MovedcellarsTable Test Case
 */
class MovedcellarsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MovedcellarsTable
     */
    protected $Movedcellars;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Movedcellars',
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
        $config = $this->getTableLocator()->exists('Movedcellars') ? [] : ['className' => MovedcellarsTable::class];
        $this->Movedcellars = $this->getTableLocator()->get('Movedcellars', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Movedcellars);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\MovedcellarsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\MovedcellarsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
