<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Estimated Entity
 *
 * @property int $id
 * @property int $agreement_id
 * @property string $quotevalue
 * @property string $nquote
 * @property \Cake\I18n\FrozenDate|null $dateend
 * @property \Cake\I18n\FrozenDate|null $dateinit
 *
 * @property \App\Model\Entity\Agreement $agreement
 */
class Estimated extends Entity
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
        'quotevalue' => true,
        'nquote' => true,
        'dateend' => true,
        'dateinit' => true,
        'agreement' => true,
    ];
}
