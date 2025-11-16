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
 * @property string|null $contrasena
 * @property string|null $correo
 * @property string|null $rol
 * @property \Cake\I18n\DateTime|null $creado_en
 *
 * @property \App\Model\Entity\Carrito[] $carrito
 * @property \App\Model\Entity\Factura[] $facturas
 */
class Usuario extends Entity
{
    /** 
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'nombre' => true,
        'contrasena' => true,
        'correo' => true,
        'rol' => true,
        'creado_en' => true,
        'carrito' => true,
        'facturas' => true,
    ];
    protected function _setPassword(string $password) : ?string
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }
        return null;
    }
}
