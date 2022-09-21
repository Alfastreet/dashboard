<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Clientscasino Entity
 *
 * @property int $id
 * @property int $client_id
 * @property int $casino_id
 *
 * @property \App\Model\Entity\Client $client
 * @property \App\Model\Entity\Casino $casino
 */
class Clientscasino extends Entity
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
        'casino_id' => true,
        'client' => true,
        'casino' => true,
    ];
}
