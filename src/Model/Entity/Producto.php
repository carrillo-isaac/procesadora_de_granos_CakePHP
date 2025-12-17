<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Producto Entity
 *
 * @property int $id
 * @property string $nombre
 * @property string|null $descripcion
 * @property int $categoria_id
 * @property string|null $precio
 * @property string|null $ruta_imagen
 * @property \Cake\I18n\DateTime|null $creado_en
 *
 * @property \App\Model\Entity\Categoria $categoria
 * @property \App\Model\Entity\Carrito[] $carrito
 * @property \App\Model\Entity\FacturaDetalle[] $factura_detalles
 */
class Producto extends Entity
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
        'nombre' => true,
        'descripcion' => true,
        'categoria_id' => true,
        'precio' => true,
        'ruta_imagen' => true,
        'creado_en' => true,
        'categoria' => true,
        'carrito' => true,
        'factura_detalles' => true,
    ];
}
