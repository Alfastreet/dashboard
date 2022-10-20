<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Machine Entity
 *
 * @property int $id
 * @property int|null $idint
 * @property string $serial
 * @property string $name
 * @property int $yearModel
 * @property int $model_id
 * @property int $maker_id
 * @property string $warranty
 * @property string $image
 * @property string $height
 * @property string $width
 * @property string $display
 * @property \Cake\I18n\FrozenTime $dateInstalling
 * @property int $casino_id
 * @property int $owner_id
 * @property int $company_id
 * @property int $contract_id
 * @property int $cheked
 * @property string|null $value
 *
 * @property \App\Model\Entity\Model $model
 * @property \App\Model\Entity\Maker $maker
 * @property \App\Model\Entity\Casino $casino
 * @property \App\Model\Entity\Owner $owner
 * @property \App\Model\Entity\Company $company
 * @property \App\Model\Entity\Contract $contract
 * @property \App\Model\Entity\Accountant $accountant
 * @property \App\Model\Entity\Machinepart[] $machinepart
 */
class Machine extends Entity
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
        'idint' => true,
        'serial' => true,
        'name' => true,
        'yearModel' => true,
        'model_id' => true,
        'maker_id' => true,
        'warranty' => true,
        'image' => true,
        'height' => true,
        'width' => true,
        'display' => true,
        'dateInstalling' => true,
        'casino_id' => true,
        'owner_id' => true,
        'company_id' => true,
        'contract_id' => true,
        'cheked' => true,
        'value' => true,
        'model' => true,
        'maker' => true,
        'casino' => true,
        'owner' => true,
        'company' => true,
        'contract' => true,
        'accountant' => true,
        'machinepart' => true,
    ];
}
