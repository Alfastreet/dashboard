<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DataiportantsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DataiportantsTable Test Case
 */
class DataiportantsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DataiportantsTable
     */
    protected $Dataiportants;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Dataiportants',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Dataiportants') ? [] : ['className' => DataiportantsTable::class];
        $this->Dataiportants = $this->getTableLocator()->get('Dataiportants', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Dataiportants);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\DataiportantsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
