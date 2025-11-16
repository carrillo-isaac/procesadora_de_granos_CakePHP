<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FacturaDetalle Entity
 *
 * @property int $id
 * @property int|null $factura_id
 * @property int|null $producto_id
 * @property int|null $cantidad
 * @property string|null $precio_unitario
 *
 * @property \App\Model\Entity\Factura $factura
 * @property \App\Model\Entity\Producto $producto
 */
class FacturaDetalle extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'factura_id' => true,
        'producto_id' => true,
        'cantidad' => true,
        'precio_unitario' => true,
        'factura' => true,
        'producto' => true,
    ];
}
