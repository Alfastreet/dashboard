<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CasinosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CasinosTable Test Case
 */
class CasinosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CasinosTable
     */
    protected $Casinos;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Casinos',
        'app.Cities',
        'app.States',
        'app.Owners',
        'app.Companies',
        'app.Clientscasinos',
        'app.Machines',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Casinos') ? [] : ['className' => CasinosTable::class];
        $this->Casinos = $this->getTableLocator()->get('Casinos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Casinos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CasinosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\CasinosTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
