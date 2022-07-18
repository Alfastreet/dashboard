<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Company Entity
 *
 * @property int $id
 * @property string $name
 * @property int $phone
 * @property string $address
 * @property string $email
 *
 * @property \App\Model\Entity\Casino[] $casinos
 * @property \App\Model\Entity\Machine[] $machines
 * @property \App\Model\Entity\Ownercompany[] $ownercompany
 */
class Company extends Entity
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
        'address' => true,
        'email' => true,
        'casinos' => true,
        'machines' => true,
        'ownercompany' => true,
        'business_id' => true
    ];
}
