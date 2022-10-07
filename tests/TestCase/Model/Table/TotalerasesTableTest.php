<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TotalerasesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TotalerasesTable Test Case
 */
class TotalerasesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TotalerasesTable
     */
    protected $Totalerases;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Totalerases',
        'app.Casinos',
        'app.Months',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Totalerases') ? [] : ['className' => TotalerasesTable::class];
        $this->Totalerases = $this->getTableLocator()->get('Totalerases', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Totalerases);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TotalerasesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\TotalerasesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
