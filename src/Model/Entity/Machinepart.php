<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Machinepart Entity
 *
 * @property int $id
 * @property int $machine_id
 * @property int $part_id
 *
 * @property \App\Model\Entity\Machine $machine
 * @property \App\Model\Entity\Part $part
 */
class Machinepart extends Entity
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
        'part_id' => true,
        'machine' => true,
        'part' => true,
    ];
}
