<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Casino Entity
 *
 * @property int $id
 * @property string $name
 * @property int $phone
 * @property string $address
 * @property int $city_id
 * @property int $state_id
 * @property int $owner_id
 * @property int $company_id
 * @property string $image
 *
 * @property \App\Model\Entity\City $city
 * @property \App\Model\Entity\State $state
 * @property \App\Model\Entity\Owner $owner
 * @property \App\Model\Entity\Company $company
 * @property \App\Model\Entity\Clientscasino[] $clientscasinos
 * @property \App\Model\Entity\Machine[] $machines
 */
class Casino extends Entity
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
        'city_id' => true,
        'state_id' => true,
        'owner_id' => true,
        'company_id' => true,
        'image' => true,
        'city' => true,
        'state' => true,
        'owner' => true,
        'company' => true,
        'clientscasinos' => true,
        'machines' => true,
    ];
}
