<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Factura Entity
 *
 * @property int $id
 * @property int|null $usuario_id
 * @property string|null $total
 * @property \Cake\I18n\DateTime|null $fecha
 *
 * @property \App\Model\Entity\Usuario $usuario
 * @property \App\Model\Entity\FacturaDetalle[] $factura_detalles
 */
class Factura extends Entity
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
        'usuario_id' => true,
        'total' => true,
        'fecha' => true,
        'usuario' => true,
        'factura_detalles' => true,
    ];
}
