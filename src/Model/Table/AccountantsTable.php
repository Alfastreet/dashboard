<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Accountants Model
 *
 * @property \App\Model\Table\MachinesTable&\Cake\ORM\Association\BelongsTo $Machines
 * @property \App\Model\Table\CasinosTable&\Cake\ORM\Association\BelongsTo $Casinos
 * @property \App\Model\Table\AccountantsstatusesTable&\Cake\ORM\Association\BelongsTo $Accountantsstatuses
 *
 * @method \App\Model\Entity\Accountant newEmptyEntity()
 * @method \App\Model\Entity\Accountant newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Accountant[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Accountant get($primaryKey, $options = [])
 * @method \App\Model\Entity\Accountant findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Accountant patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Accountant[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Accountant|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Accountant saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Accountant[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Accountant[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Accountant[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Accountant[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class AccountantsTable extends Table
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

        $this->setTable('accountants');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Machines', [
            'foreignKey' => 'machine_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Casinos', [
            'foreignKey' => 'casino_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Accountantsstatus', [
            'foreignKey' => 'accountantsstatus_id',
            'joinType' => 'INNER',
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
            ->integer('machine_id')
            ->requirePresence('machine_id', 'create')
            ->notEmptyString('machine_id');

        $validator
            ->integer('casino_id')
            ->requirePresence('casino_id', 'create')
            ->notEmptyString('casino_id');

        $validator
            ->integer('month')
            ->requirePresence('month', 'create')
            ->notEmptyString('month');

        $validator
            ->integer('year')
            ->requirePresence('year', 'create')
            ->notEmptyString('year');

        $validator
            ->scalar('total_prof')
            ->maxLength('total_prof', 255)
            ->requirePresence('total_prof', 'create')
            ->notEmptyString('total_prof');

        $validator
            ->scalar('token')
            ->maxLength('token', 255)
            ->requirePresence('token', 'create')
            ->notEmptyString('token');

        $validator
            ->integer('accountantsstatus_id')
            ->requirePresence('accountantsstatus_id', 'create')
            ->notEmptyString('accountantsstatus_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('machine_id', 'Machines'), ['errorField' => 'machine_id']);
        $rules->add($rules->existsIn('casino_id', 'Casinos'), ['errorField' => 'casino_id']);
        $rules->add($rules->existsIn('accountantsstatus_id', 'Accountantsstatus'), ['errorField' => 'accountantsstatus_id']);

        return $rules;
    }
}
