<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DetailsaccountantsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DetailsaccountantsTable Test Case
 */
class DetailsaccountantsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DetailsaccountantsTable
     */
    protected $Detailsaccountants;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Detailsaccountants',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Detailsaccountants') ? [] : ['className' => DetailsaccountantsTable::class];
        $this->Detailsaccountants = $this->getTableLocator()->get('Detailsaccountants', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Detailsaccountants);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\DetailsaccountantsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
