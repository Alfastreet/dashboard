<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Agreement Entity
 *
 * @property int $id
 * @property int $client_id
 * @property int $business_id
 * @property int $machine_id
 * @property string $discount
 * @property string $agreementvalue
 * @property string $nquote
 * @property string $quoteini
 * @property string $separation
 * @property int $agreementstatus_id
 * @property \Cake\I18n\FrozenDate $datesigned
 * @property string $comments
 *
 * @property \App\Model\Entity\Machine $machine
 * @property \App\Model\Entity\Agreementstatus $agreementstatus
 */
class Agreement extends Entity
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
        'client_id' => true,
        'business_id' => true,
        'machine_id' => true,
        'discount' => true,
        'agreementvalue' => true,
        'nquote' => true,
        'quoteini' => true,
        'separation' => true,
        'agreementstatus_id' => true,
        'datesigned' => true,
        'comments' => true,
        'machine' => true,
        'agreementstatus' => true,
        'percentinicial' => true,
    ];
}
