<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tiket Entity
 *
 * @property int $id
 * @property int $machine_id
 * @property string $email
 * @property string $phone
 * @property string $comments
 * @property \Cake\I18n\FrozenDate $datecreate
 * @property string $status
 * @property string $resolved
 * @property int|null $support_id
 * @property string|null $name_client
 * @property int|null $user_id
 * @property \Cake\I18n\FrozenDate|null $dateresolved
 *
 * @property \App\Model\Entity\Machine $machine
 * @property \App\Model\Entity\Support $support
 * @property \App\Model\Entity\User $user
 */
class Tiket extends Entity
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
        'machine_id' => true,
        'email' => true,
        'phone' => true,
        'comments' => true,
        'datecreate' => true,
        'status' => true,
        'resolved' => true,
        'support_id' => true,
        'name_client' => true,
        'user_id' => true,
        'dateresolved' => true,
        'machine' => true,
        'support' => true,
        'user' => true,
    ];
}
