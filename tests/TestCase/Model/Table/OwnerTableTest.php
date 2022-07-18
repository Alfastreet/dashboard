<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OwnerTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OwnerTable Test Case
 */
class OwnerTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OwnerTable
     */
    protected $Owner;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Owner',
        'app.Business',
        'app.Casinos',
        'app.Machines',
        'app.Ownercompany',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Owner') ? [] : ['className' => OwnerTable::class];
        $this->Owner = $this->getTableLocator()->get('Owner', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Owner);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\OwnerTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
