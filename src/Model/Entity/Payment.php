<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Payment Entity
 *
 * @property int $id
 * @property int $agreement_id
 * @property string $paymentquote
 * @property string $valuequote
 * @property \Cake\I18n\FrozenDate|null $datepayment
 * @property int $destiny_id
 * @property int|null $bank_id
 * @property string|null $cop
 * @property string|null $trm
 * @property string $referencepay
 *
 * @property \App\Model\Entity\Agreement $agreement
 * @property \App\Model\Entity\Destiny $destiny
 */
class Payment extends Entity
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
        'paymentquote' => true,
        'valuequote' => true,
        'datepayment' => true,
        'destiny_id' => true,
        'bank_id' => true,
        'cop' => true,
        'trm' => true,
        'referencepay' => true,
        'agreement' => true,
        'destiny' => true,
    ];
}
