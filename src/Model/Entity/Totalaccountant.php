<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Totalaccountant Entity
 *
 * @property int $id
 * @property int $casino_id
 * @property int $month_id
 * @property string $year
 * @property string $totalLiquidation
 *
 * @property \App\Model\Entity\Casino $casino
 * @property \App\Model\Entity\Machine $machine
 * @property \App\Model\Entity\Month $month
 */
class Totalaccountant extends Entity
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
        'casino_id' => true,
        'month_id' => true,
        'year' => true,
        'totalLiquidation' => true,
        'casino' => true,
        'machine' => true,
        'month' => true,
    ];
}
