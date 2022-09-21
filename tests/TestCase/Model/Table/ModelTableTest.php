<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ModelTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ModelTable Test Case
 */
class ModelTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ModelTable
     */
    protected $Model;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Model',
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
        $config = $this->getTableLocator()->exists('Model') ? [] : ['className' => ModelTable::class];
        $this->Model = $this->getTableLocator()->get('Model', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Model);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ModelTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
