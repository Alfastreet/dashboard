<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClientpositionTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClientpositionTable Test Case
 */
class ClientpositionTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ClientpositionTable
     */
    protected $Clientposition;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Clientposition',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Clientposition') ? [] : ['className' => ClientpositionTable::class];
        $this->Clientposition = $this->getTableLocator()->get('Clientposition', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Clientposition);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ClientpositionTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
