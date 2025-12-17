<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CarritoFixture
 */
class CarritoFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'carrito';
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
                'usuario_id' => 1,
                'producto_id' => 1,
                'cantidad' => 1,
            ],
        ];
        parent::init();
    }
}
