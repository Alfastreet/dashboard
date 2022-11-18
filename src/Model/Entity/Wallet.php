<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Wallet Entity
 *
 * @property int $id
 * @property int $agreement_id
 * @property string $payment
 * @property string $collection
 * @property \Cake\I18n\FrozenDate $lastpay
 * @property string $quotemora
 * @property string $mora
 *
 * @property \App\Model\Entity\Agreement $agreement
 */
class Wallet extends Entity
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
        'agreement_id' => true,
        'payment' => true,
        'collection' => true,
        'lastpay' => true,
        'quotemora' => true,
        'mora' => true,
        'agreement' => true,
    ];
}
