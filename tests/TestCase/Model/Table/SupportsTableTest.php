<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SupportsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SupportsTable Test Case
 */
class SupportsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SupportsTable
     */
    protected $Supports;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Supports',
        'app.Tikets',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Supports') ? [] : ['className' => SupportsTable::class];
        $this->Supports = $this->getTableLocator()->get('Supports', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Supports);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SupportsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
