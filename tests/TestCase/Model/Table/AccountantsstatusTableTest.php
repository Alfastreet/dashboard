<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AccountantsstatusTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AccountantsstatusTable Test Case
 */
class AccountantsstatusTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AccountantsstatusTable
     */
    protected $Accountantsstatus;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Accountantsstatus',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Accountantsstatus') ? [] : ['className' => AccountantsstatusTable::class];
        $this->Accountantsstatus = $this->getTableLocator()->get('Accountantsstatus', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Accountantsstatus);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AccountantsstatusTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
