<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DestiniesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DestiniesTable Test Case
 */
class DestiniesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DestiniesTable
     */
    protected $Destinies;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Destinies',
        'app.Paymentinitials',
        'app.Payments',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Destinies') ? [] : ['className' => DestiniesTable::class];
        $this->Destinies = $this->getTableLocator()->get('Destinies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Destinies);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\DestiniesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
