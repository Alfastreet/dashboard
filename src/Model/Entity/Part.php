<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Part Entity
 *
 * @property int $id
 * @property string $serial
 * @property string $name
 * @property int $money_id
 * @property int $value
 * @property int $amount
 *
 * @property \App\Model\Entity\Money $money
 * @property \App\Model\Entity\Machinepart[] $machinepart
 */
class Part extends Entity
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
        'serial' => true,
        'name' => true,
        'money_id' => true,
        'value' => true,
        'amount' => true,
        'money' => true,
        'machinepart' => true,
    ];
}
