<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RolTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RolTable Test Case
 */
class RolTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RolTable
     */
    protected $Rol;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Rol',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Rol') ? [] : ['className' => RolTable::class];
        $this->Rol = $this->getTableLocator()->get('Rol', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Rol);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\RolTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
