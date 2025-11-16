<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FacturaDetallesFixture
 */
class FacturaDetallesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'factura_id' => 1,
                'producto_id' => 1,
                'cantidad' => 1,
                'precio_unitario' => 1.5,
            ],
        ];
        parent::init();
    }
}
