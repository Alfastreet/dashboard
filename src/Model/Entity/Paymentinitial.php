<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Paymentinitial Entity
 *
 * @property int $id
 * @property int $agreement_id
 * @property string $valuequote
 * @property \Cake\I18n\FrozenDate $datepayment
 * @property string $trm
 * @property string $cop
 * @property int $destiny_id
 * @property int $bank_id
 * @property string $referencepay
 *
 * @property \App\Model\Entity\Agreement $agreement
 * @property \App\Model\Entity\Destiny $destiny
 */
class Paymentinitial extends Entity
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
        'valuequote' => true,
        'datepayment' => true,
        'trm' => true,
        'cop' => true,
        'destiny_id' => true,
        'bank_id' => true,
        'referencepay' => true,
        'agreement' => true,
        'destiny' => true,
    ];
}
