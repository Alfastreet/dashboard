<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Accountantsstatus Model
 *
 * @property \App\Model\Table\AccountantsTable&\Cake\ORM\Association\HasMany $Accountants
 *
 * @method \App\Model\Entity\Accountantsstatus newEmptyEntity()
 * @method \App\Model\Entity\Accountantsstatus newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Accountantsstatus[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Accountantsstatus get($primaryKey, $options = [])
 * @method \App\Model\Entity\Accountantsstatus findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Accountantsstatus patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Accountantsstatus[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Accountantsstatus|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Accountantsstatus saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Accountantsstatus[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Accountantsstatus[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Accountantsstatus[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Accountantsstatus[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class AccountantsstatusTable extends Table
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

        $this->setTable('accountantsstatus');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Accountants', [
            'foreignKey' => 'accountantsstatus_id',
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
            ->scalar('status')
            ->maxLength('status', 255)
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        return $validator;
    }
}
