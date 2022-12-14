<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ownercompany Entity
 *
 * @property int $id
 * @property int $owner_id
 * @property int $company_id
 *
 * @property \App\Model\Entity\Owner $owner
 * @property \App\Model\Entity\Company $company
 */
class Ownercompany extends Entity
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
        'owner_id' => true,
        'company_id' => true,
        'owner' => true,
        'company' => true,
    ];
}
