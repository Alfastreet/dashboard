<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Liquidation Entity
 *
 * @property int $id
 * @property int $casino_id
 * @property int $machine_id
 * @property int $month_id
 * @property int $year
 * @property string $cashin
 * @property string $cashout
 * @property string $bet
 * @property string $win
 * @property string $profit
 * @property string $jackpot
 * @property string $games
 * @property string $coljuegos
 * @property string $admin
 * @property string $total
 * @property string $alfastreet
 *
 * @property \App\Model\Entity\Casino $casino
 * @property \App\Model\Entity\Machine $machine
 * @property \App\Model\Entity\Month $month
 */
class Liquidation extends Entity
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
        'machine_id' => true,
        'month_id' => true,
        'year' => true,
        'cashin' => true,
        'cashout' => true,
        'bet' => true,
        'win' => true,
        'profit' => true,
        'jackpot' => true,
        'games' => true,
        'coljuegos' => true,
        'admin' => true,
        'total' => true,
        'alfastreet' => true,
        'casino' => true,
        'machine' => true,
        'month' => true,
    ];
}
