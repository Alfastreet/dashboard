<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LinksTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LinksTable Test Case
 */
class LinksTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LinksTable
     */
    protected $Links;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Links',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Links') ? [] : ['className' => LinksTable::class];
        $this->Links = $this->getTableLocator()->get('Links', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Links);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\LinksTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
