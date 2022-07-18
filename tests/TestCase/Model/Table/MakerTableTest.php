<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MakerTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MakerTable Test Case
 */
class MakerTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MakerTable
     */
    protected $Maker;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Maker',
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
        $config = $this->getTableLocator()->exists('Maker') ? [] : ['className' => MakerTable::class];
        $this->Maker = $this->getTableLocator()->get('Maker', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Maker);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\MakerTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
