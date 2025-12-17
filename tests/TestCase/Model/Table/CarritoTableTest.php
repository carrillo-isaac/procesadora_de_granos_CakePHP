<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CarritoTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CarritoTable Test Case
 */
class CarritoTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CarritoTable
     */
    protected $Carrito;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Carrito',
        'app.Usuarios',
        'app.Productos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Carrito') ? [] : ['className' => CarritoTable::class];
        $this->Carrito = $this->getTableLocator()->get('Carrito', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Carrito);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\CarritoTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\CarritoTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
