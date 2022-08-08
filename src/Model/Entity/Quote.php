<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Quote Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $business_id
 * @property \Cake\I18n\FrozenTime $date
 * @property string $total
 * @property int $estatus_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Business $business
 * @property \App\Model\Entity\Estatus $estatus
 * @property \App\Model\Entity\Detailsquote[] $detailsquotes
 */
class Quote extends Entity
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
        'user_id' => true,
        'business_id' => true,
        'date' => true,
        'total' => true,
        'estatus_id' => true,
        'user' => true,
        'business' => true,
        'estatus' => true,
        'detailsquotes' => true,
    ];

    protected $_hidden = [
        'token',
    ];
}
