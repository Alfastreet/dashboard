<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Owner Model
 *
 * @property \App\Model\Table\BusinessTable&\Cake\ORM\Association\HasMany $Business
 * @property \App\Model\Table\CasinosTable&\Cake\ORM\Association\HasMany $Casinos
 * @property \App\Model\Table\MachinesTable&\Cake\ORM\Association\HasMany $Machines
 * @property \App\Model\Table\OwnercompanyTable&\Cake\ORM\Association\HasMany $Ownercompany
 *
 * @method \App\Model\Entity\Owner newEmptyEntity()
 * @method \App\Model\Entity\Owner newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Owner[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Owner get($primaryKey, $options = [])
 * @method \App\Model\Entity\Owner findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Owner patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Owner[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Owner|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Owner saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Owner[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Owner[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Owner[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Owner[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class OwnerTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('owner');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Business', [
            'foreignKey' => 'owner_id',
        ]);
        $this->hasMany('Casinos', [
            'foreignKey' => 'owner_id',
        ]);
        $this->hasMany('Machines', [
            'foreignKey' => 'owner_id',
        ]);
        $this->hasMany('Ownercompany', [
            'foreignKey' => 'owner_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->integer('phone')
            ->requirePresence('phone', 'create')
            ->notEmptyString('phone');

        $validator
            ->scalar('address')
            ->maxLength('address', 200)
            ->requirePresence('address', 'create')
            ->notEmptyString('address');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        return $validator;
    }
}
