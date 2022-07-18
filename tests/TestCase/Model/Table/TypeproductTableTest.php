<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypeproductTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TypeproductTable Test Case
 */
class TypeproductTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TypeproductTable
     */
    protected $Typeproduct;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Typeproduct',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Typeproduct') ? [] : ['className' => TypeproductTable::class];
        $this->Typeproduct = $this->getTableLocator()->get('Typeproduct', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Typeproduct);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TypeproductTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
