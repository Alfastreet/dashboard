<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity
 *
 * @property int $id
 * @property int $quote_id
 * @property int $user_id
 * @property int $detailsquotes_id
 * @property int $parts_id
 * @property int $client_id
 * @property string $comments
 *
 * @property \App\Model\Entity\Quote $quote
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Detailsquote $detailsquote
 * @property \App\Model\Entity\Part $part
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
        'quote_id' => true,
        'user_id' => true,
        'detailsquotes_id' => true,
        'parts_id' => true,
        'client_id' => true,
        'comments' => true,
        'quote' => true,
        'user' => true,
        'detailsquote' => true,
        'part' => true,
    ];
}
