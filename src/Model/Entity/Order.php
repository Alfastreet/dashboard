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
 *
 * @property \App\Model\Entity\Order[] $orders
 * @property \App\Model\Entity\Quote $quote
 * @property \App\Model\Entity\User $user
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
        'orders' => true,
        'quote' => true,
        'user' => true,
    ];
}
