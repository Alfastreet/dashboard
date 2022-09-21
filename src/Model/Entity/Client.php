<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Client Entity
 *
 * @property int $id
 * @property string $name
 * @property int $phone
 * @property string $email
 * @property int $position_id
 * @property int $business_id
 *
 * @property \App\Model\Entity\Position $position
 * @property \App\Model\Entity\Business $business
 * @property \App\Model\Entity\Clientscasino[] $clientscasinos
 */
class Client extends Entity
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
        'phone' => true,
        'email' => true,
        'position_id' => true,
        'business_id' => true,
        'position' => true,
        'business' => true,
        'clientscasinos' => true,
        'token' => true
    ];
}
