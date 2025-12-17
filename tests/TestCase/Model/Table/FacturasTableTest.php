<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FacturasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FacturasTable Test Case
 */
class FacturasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FacturasTable
     */
    protected $Facturas;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Facturas',
        'app.Usuarios',
        'app.FacturaDetalles',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Facturas') ? [] : ['className' => FacturasTable::class];
        $this->Facturas = $this->getTableLocator()->get('Facturas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Facturas);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\FacturasTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\FacturasTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
