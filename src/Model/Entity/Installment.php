<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Installment Entity
 *
 * @property int $id
 * @property int $quote_id
 * @property \Cake\I18n\FrozenDate $dateinstallment
 * @property string $guide
 *
 * @property \App\Model\Entity\Quote $quote
 */
class Installment extends Entity
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
        'quote_id' => true,
        'dateinstallment' => true,
        'guide' => true,
        'quote' => true,
    ];
}
