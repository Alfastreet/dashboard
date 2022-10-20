<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AgreementsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AgreementsTable Test Case
 */
class AgreementsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AgreementsTable
     */
    protected $Agreements;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Agreements',
        'app.Machines',
        'app.Agreementstatuses',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Agreements') ? [] : ['className' => AgreementsTable::class];
        $this->Agreements = $this->getTableLocator()->get('Agreements', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Agreements);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AgreementsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\AgreementsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
