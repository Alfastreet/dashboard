<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Detailsaccountant Entity
 *
 * @property int $id
 * @property int $accountants_id
 * @property int $day_init
 * @property int $day_end
 * @property int $month
 * @property int $year
 * @property string $total_init
 * @property string $total_end
 * @property string $profit
 * @property string $coljuegoa
 * @property string $iva
 * @property string $juegos_jug
 *
 * @property \App\Model\Entity\Accountant $accountant
 */
class Detailsaccountant extends Entity
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
        'day_init' => true,
        'day_end' => true,
        'month' => true,
        'year' => true,
        'total_init' => true,
        'total_end' => true,
        'profit' => true,
        'coljuegoa' => true,
        'iva' => true,
        'juegos_jug' => true,
        'accountant' => true,
    ];
}
