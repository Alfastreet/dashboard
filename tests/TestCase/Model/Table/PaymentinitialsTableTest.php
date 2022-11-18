<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PaymentinitialsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PaymentinitialsTable Test Case
 */
class PaymentinitialsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PaymentinitialsTable
     */
    protected $Paymentinitials;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Paymentinitials',
        'app.Agreements',
        'app.Destinies',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Paymentinitials') ? [] : ['className' => PaymentinitialsTable::class];
        $this->Paymentinitials = $this->getTableLocator()->get('Paymentinitials', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Paymentinitials);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PaymentinitialsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\PaymentinitialsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
