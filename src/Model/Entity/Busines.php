<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Busines Entity
 *
 * @property int $id
 * @property string $name
 * @property int $nit
 * @property int $phone
 * @property string $address
 * @property string $email
 * @property int $owner_id
 *
 * @property \App\Model\Entity\Owner $owner
 */
class Busines extends Entity
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
        'nit' => true,
        'phone' => true,
        'address' => true,
        'email' => true,
        'owner_id' => true,
        'owner' => true,
    ];
}
