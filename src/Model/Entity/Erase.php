<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Erase Entity
 *
 * @property int $id
 * @property int $machine_id
 * @property int $details_id
 * @property string|null $image
 * @property string|null $alfastreet
 * @property string|null $total
 * @property string|null $admin
 * @property string|null $coljuegos
 * @property string|null $gamesplayed
 * @property string|null $jackpot
 * @property string|null $profit
 * @property string|null $win
 * @property string|null $bet
 * @property string|null $cashout
 * @property string|null $cashin
 * @property string|null $year
 * @property int|null $month_id
 * @property string|null $day_end
 * @property string|null $day_init
 *
 * @property \App\Model\Entity\Machine $machine
 * @property \App\Model\Entity\Month $month
 */
class Erase extends Entity
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
        'image' => true,
        'alfastreet' => true,
        'total' => true,
        'admin' => true,
        'coljuegos' => true,
        'gamesplayed' => true,
        'jackpot' => true,
        'profit' => true,
        'win' => true,
        'bet' => true,
        'cashout' => true,
        'cashin' => true,
        'year' => true,
        'month_id' => true,
        'day_end' => true,
        'day_init' => true,
        'machine' => true,
        'month' => true,
    ];
}
