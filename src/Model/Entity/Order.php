<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity
 *
 * @property int $id
 * @property int $order_id
 * @property int $quote_id
 * @property int $user_id
 * @property int $client_id
 * @property string|null $comments
 * @property int $orderstatus_id
 * @property int|null $machine_id
 * @property string|null $x2max
 * @property string|null $x3max
 * @property string|null $x6max
 * @property string|null $x7max
 * @property string|null $x9max
 * @property string|null $x12max
 * @property string|null $x18max
 * @property string|null $x36max
 * @property string|null $exteriormax
 * @property string|null $interiormax
 * @property string|null $totalmax
 * @property string|null $x2min
 * @property string|null $x3min
 * @property string|null $x6min
 * @property string|null $x7min
 * @property string|null $x9min
 * @property string|null $x12min
 * @property string|null $x18min
 * @property string|null $x36min
 * @property string|null $exteriormin
 * @property string|null $interiormin
 * @property string|null $totalmin
 * @property string|null $limitmax
 * @property string|null $apuestamin
 * @property string|null $fecuenciafin
 * @property string|null $frecuenciaini
 * @property string|null $hiddenper
 * @property string|null $apuestaper
 * @property string|null $timeapuesta
 * @property string|null $contrasoplado
 * @property string|null $soplado
 *
 * @property \App\Model\Entity\Quote $quote
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Orderstatus $orderstatus
 * @property \App\Model\Entity\Machine $machine
 * @property \App\Model\Entity\Order[] $orders
 */
class Order extends Entity
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
        'order_id' => true,
        'quote_id' => true,
        'user_id' => true,
        'client_id' => true,
        'comments' => true,
        'orderstatus_id' => true,
        'machine_id' => true,
        'x2max' => true,
        'x3max' => true,
        'x6max' => true,
        'x7max' => true,
        'x9max' => true,
        'x12max' => true,
        'x18max' => true,
        'x36max' => true,
        'exteriormax' => true,
        'interiormax' => true,
        'totalmax' => true,
        'x2min' => true,
        'x3min' => true,
        'x6min' => true,
        'x7min' => true,
        'x9min' => true,
        'x12min' => true,
        'x18min' => true,
        'x36min' => true,
        'exteriormin' => true,
        'interiormin' => true,
        'totalmin' => true,
        'limitmax' => true,
        'apuestamin' => true,
        'fecuenciafin' => true,
        'frecuenciaini' => true,
        'hiddenper' => true,
        'apuestaper' => true,
        'timeapuesta' => true,
        'contrasoplado' => true,
        'soplado' => true,
        'quote' => true,
        'user' => true,
        'orderstatus' => true,
        'machine' => true,
        'orders' => true,
    ];
}
