<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypeproductsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TypeproductsTable Test Case
 */
class TypeproductsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TypeproductsTable
     */
    protected $Typeproducts;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Typeproducts',
        'app.Parts',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Typeproducts') ? [] : ['className' => TypeproductsTable::class];
        $this->Typeproducts = $this->getTableLocator()->get('Typeproducts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Typeproducts);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TypeproductsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
