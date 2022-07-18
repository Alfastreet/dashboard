<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tmpdetailsquote Entity
 *
 * @property int $id
 * @property int $typeProduct_id
 * @property int $product_id
 * @property int $amount
 * @property string $value
 * @property string $token
 *
 * @property \App\Model\Entity\TypeProduct $type_product
 * @property \App\Model\Entity\Product $product
 */
class Tmpdetailsquote extends Entity
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
        'typeProduct_id' => true,
        'product_id' => true,
        'amount' => true,
        'value' => true,
        'token' => true,
        'type_product' => true,
        'product' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected $_hidden = [
        'token',
    ];
}
