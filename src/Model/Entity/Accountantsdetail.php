<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Accountantsdetail Entity
 *
 * @property int $id
 * @property int $accountants_id
 * @property int $details_id
 *
 * @property \App\Model\Entity\Accountant $accountant
 * @property \App\Model\Entity\Detail $detail
 */
class Accountantsdetail extends Entity
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
        'accountants_id' => true,
        'details_id' => true,
        'accountant' => true,
        'detail' => true,
        'client_id' => true,
    ];
}
