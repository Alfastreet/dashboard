<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CompanyTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CompanyTable Test Case
 */
class CompanyTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CompanyTable
     */
    protected $Company;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Company',
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
        $config = $this->getTableLocator()->exists('Company') ? [] : ['className' => CompanyTable::class];
        $this->Company = $this->getTableLocator()->get('Company', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Company);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CompanyTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
