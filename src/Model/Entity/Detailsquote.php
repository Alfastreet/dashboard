<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Detailsquote Entity
 *
 * @property int $id
 * @property int $quote_id
 * @property int $typeProduct_id
 * @property int $product_id
 * @property int $amount
 * @property string $value
 *
 * @property \App\Model\Entity\Quote $quote
 * @property \App\Model\Entity\TypeProduct $type_product
 * @property \App\Model\Entity\Product $product
 */
class Detailsquote extends Entity
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
        'typeProduct_id' => true,
        'product_id' => true,
        'amount' => true,
        'value' => true,
        'quote' => true,
        'type_product' => true,
        'product' => true,
    ];
}
