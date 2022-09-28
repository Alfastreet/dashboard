<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Quotestatus Entity
 *
 * @property int $id
 * @property int $quote_id
 * @property int $status_id
 * @property string|null $comment
 * @property int|null $invoice
 *
 * @property \App\Model\Entity\Quote $quote
 */
class Quotestatus extends Entity
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
        'status_id' => true,
        'comment' => true,
        'invoice' => true,
        'quote' => true,
    ];
}
