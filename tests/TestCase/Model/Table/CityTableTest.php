<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CityTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CityTable Test Case
 */
class CityTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CityTable
     */
    protected $City;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.City',
        'app.States',
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
        $config = $this->getTableLocator()->exists('City') ? [] : ['className' => CityTable::class];
        $this->City = $this->getTableLocator()->get('City', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->City);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CityTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\CityTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
