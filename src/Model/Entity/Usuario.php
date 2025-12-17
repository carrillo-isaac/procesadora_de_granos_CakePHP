<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Authentication\PasswordHasher\DefaultPasswordHasher;


/**
 * Usuario Entity
 *
 * @property int $id
 * @property string|null $nombre
 * @property string|null $passsword
 * @property string|null $email
 * @property string|null $rol
 * @property \Cake\I18n\DateTime|null $creado_en
 *
 * @property \App\Model\Entity\Carrito[] $carrito
 * @property \App\Model\Entity\Factura[] $facturas
 */
class Usuario extends Entity
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
        'password' => true,
        'email' => true,
        'rol' => true,
        'creado_en' => true,
        'carrito' => true,
        'facturas' => true,
    ];

    protected function _setPassword(string $password): ?string
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }
        return null;
    }
}
