<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClientscasinosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClientscasinosTable Test Case
 */
class ClientscasinosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ClientscasinosTable
     */
    protected $Clientscasinos;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Clientscasinos',
        'app.Clients',
        'app.Casinos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Clientscasinos') ? [] : ['className' => ClientscasinosTable::class];
        $this->Clientscasinos = $this->getTableLocator()->get('Clientscasinos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Clientscasinos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ClientscasinosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ClientscasinosTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
