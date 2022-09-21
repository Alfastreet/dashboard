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
 * @property string $day_init
 * @property string $day_end
 * @property int $month_id
 * @property string $year
 * @property string $cashin
 * @property string $cashout
 * @property string $bet
 * @property string $win
 * @property string $profit
 * @property string $jackpot
 * @property string $gamesplayed
 * @property string $coljuegos
 * @property string $admin
 * @property string $total
 * @property string $alfastreet
 * @property string $image
 *
 * @property \App\Model\Entity\Machine $machine
 * @property \App\Model\Entity\Casino $casino
 * @property \App\Model\Entity\Month $month
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
        'day_init' => true,
        'day_end' => true,
        'month_id' => true,
        'year' => true,
        'cashin' => true,
        'cashout' => true,
        'bet' => true,
        'win' => true,
        'profit' => true,
        'jackpot' => true,
        'gamesplayed' => true,
        'coljuegos' => true,
        'admin' => true,
        'total' => true,
        'alfastreet' => true,
        'image' => true,
        'machine' => true,
        'casino' => true,
        'month' => true,
    ];
}
