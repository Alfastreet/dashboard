<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Bank Entity
 *
 * @property int $id
 * @property string $name
 * @property string $numerocuenta
 * @property string $razonsocial
 *
 * @property \App\Model\Entity\Paymentinitial[] $paymentinitials
 * @property \App\Model\Entity\Payment[] $payments
 */
class Bank extends Entity
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
        'numerocuenta' => true,
        'razonsocial' => true,
        'paymentinitials' => true,
        'payments' => true,
    ];
}
