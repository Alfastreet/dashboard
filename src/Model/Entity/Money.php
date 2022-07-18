<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Money Entity
 *
 * @property int $id
 * @property string $name
 * @property string $urlData
 *
 * @property \App\Model\Entity\Part[] $parts
 * @property \App\Model\Entity\Service[] $services
 */
class Money extends Entity
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
        'name' => true,
        'value' => true,
        'urlData' => true,
        'parts' => true,
        'services' => true,
    ];
}
