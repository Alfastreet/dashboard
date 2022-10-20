<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AgreementstatusesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AgreementstatusesTable Test Case
 */
class AgreementstatusesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AgreementstatusesTable
     */
    protected $Agreementstatuses;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Agreementstatuses',
        'app.Agreements',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Agreementstatuses') ? [] : ['className' => AgreementstatusesTable::class];
        $this->Agreementstatuses = $this->getTableLocator()->get('Agreementstatuses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Agreementstatuses);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AgreementstatusesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
