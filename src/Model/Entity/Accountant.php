<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Accountant Entity
 *
 * @property int $id
 * @property int $machine_id
 * @property int $casino_id
 * @property int $month
 * @property int $year
 * @property string $total_prof
 * @property string $token
 * @property int $accountantsstatus_id
 *
 * @property \App\Model\Entity\Machine $machine
 * @property \App\Model\Entity\Casino $casino
 * @property \App\Model\Entity\Accountantsstatus $accountantsstatus
 */
class Accountant extends Entity
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
        'machine_id' => true,
        'casino_id' => true,
        'month' => true,
        'year' => true,
        'total_prof' => true,
        'token' => true,
        'accountantsstatus_id' => true,
        'machine' => true,
        'casino' => true,
        'accountantsstatus' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected $_hidden = [
        'token',
    ];
}
