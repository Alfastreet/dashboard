<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Movedcellar Entity
 *
 * @property int $id
 * @property int $cellar_id
 * @property int $part_id
 * @property string $amount
 * @property \Cake\I18n\FrozenDate $datemoved
 *
 * @property \App\Model\Entity\Cellar $cellar
 * @property \App\Model\Entity\Part $part
 */
class Movedcellar extends Entity
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
        'cellar_id' => true,
        'part_id' => true,
        'amount' => true,
        'datemoved' => true,
        'cellar' => true,
        'part' => true,
    ];
}
