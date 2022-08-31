<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $name
 * @property string $lastName
 * @property string $address
 * @property int $phone
 * @property int $identification
 * @property string $email
 * @property string $password
 * @property string $token
 * @property int $rol_id
 * @property int $checked
 * @property string $image
 *
 * @property \App\Model\Entity\Rol $rol
 * @property \App\Model\Entity\Quote[] $quotes
 */
class User extends Entity
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
    protected $_accessible = [
        'name' => true,
        'lastName' => true,
        'address' => true,
        'phone' => true,
        'identification' => true,
        'email' => true,
        'password' => true,
        'token' => true,
        'rol_id' => true,
        'checked' => true,
        'image' => true,
        'rol' => true,
        'quotes' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected $_hidden = [
        'password',
        'token',
    ];


    protected function _setPassword(String $password) : ?string
    {

        if(strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }

    }
}
