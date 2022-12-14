<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Machines Model
 *
 * @property \App\Model\Table\ModelsTable&\Cake\ORM\Association\BelongsTo $Models
 * @property \App\Model\Table\MakersTable&\Cake\ORM\Association\BelongsTo $Makers
 * @property \App\Model\Table\CasinosTable&\Cake\ORM\Association\BelongsTo $Casinos
 * @property \App\Model\Table\OwnersTable&\Cake\ORM\Association\BelongsTo $Owners
 * @property \App\Model\Table\CompaniesTable&\Cake\ORM\Association\BelongsTo $Companies
 * @property \App\Model\Table\ContractsTable&\Cake\ORM\Association\BelongsTo $Contracts
 * @property \App\Model\Table\AccountantsTable&\Cake\ORM\Association\BelongsTo $Accountants
 * @property \App\Model\Table\AccountantsTable&\Cake\ORM\Association\HasMany $Accountants
 * @property \App\Model\Table\MachinepartTable&\Cake\ORM\Association\HasMany $Machinepart
 *
 * @method \App\Model\Entity\Machine newEmptyEntity()
 * @method \App\Model\Entity\Machine newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Machine[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Machine get($primaryKey, $options = [])
 * @method \App\Model\Entity\Machine findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Machine patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Machine[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Machine|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Machine saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Machine[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Machine[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Machine[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Machine[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class MachinesTable extends Table
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

        $this->setTable('machines');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Model', [
            'foreignKey' => 'model_id',
            'joinType' => 'INNER',
            
        ]);
        $this->belongsTo('Maker', [
            'foreignKey' => 'maker_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Casinos', [
            'foreignKey' => 'casino_id',
            'joinType' => 'LEFT',
            
        ]);
        $this->belongsTo('Owner', [
            'foreignKey' => 'owner_id',
            'joinType' => 'LEFT',
        ]);
        $this->belongsTo('Company', [
            'foreignKey' => 'company_id',
            'joinType' => 'LEFT',
        ]);
        $this->belongsTo('Contract', [
            'foreignKey' => 'contract_id',
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
            ->integer('idint')
            ->allowEmptyString('idint');

        $validator
            ->scalar('serial')
            ->maxLength('serial', 255)
            ->allowEmptyString('serial');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->integer('yearModel')
            ->requirePresence('yearModel', 'create')
            ->notEmptyString('yearModel');

        $validator
            ->integer('model_id')
            ->requirePresence('model_id', 'create')
            ->notEmptyString('model_id');

        $validator
            ->integer('maker_id')
            ->requirePresence('maker_id', 'create')
            ->notEmptyString('maker_id');

        $validator
            ->scalar('warranty')
            ->maxLength('warranty', 255)
            ->requirePresence('warranty', 'create')
            ->notEmptyString('warranty');

        $validator
            ->scalar('image')
            ->maxLength('image', 255)
            ->requirePresence('image', 'create')
            ->notEmptyFile('image');

        $validator
            ->scalar('height')
            ->maxLength('height', 255)
            ->requirePresence('height', 'create')
            ->notEmptyString('height');

        $validator
            ->scalar('width')
            ->maxLength('width', 255)
            ->requirePresence('width', 'create')
            ->notEmptyString('width');

        $validator
            ->scalar('display')
            ->maxLength('display', 255)
            ->allowEmptyString('display');

        $validator
            ->date('dateInstalling')
            ->allowEmptyDate('dateInstalling');

        $validator
            ->integer('casino_id')
            ->allowEmptyString('casino_id');

        $validator
            ->integer('owner_id')
            ->allowEmptyString('owner_id');

        $validator
            ->integer('company_id')
            ->allowEmptyString('company_id');

        $validator
            ->integer('contract_id')
            ->requirePresence('contract_id', 'create')
            ->notEmptyString('contract_id');

        $validator
            ->scalar('value')
            ->maxLength('value', 255)
            ->allowEmptyString('value');

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
        $rules->add($rules->existsIn('model_id', 'Model'), ['errorField' => 'model_id']);
        $rules->add($rules->existsIn('maker_id', 'Maker'), ['errorField' => 'maker_id']);
        $rules->add($rules->existsIn('casino_id', 'Casinos'), ['errorField' => 'casino_id']);
        $rules->add($rules->existsIn('owner_id', 'Owner'), ['errorField' => 'owner_id']);
        $rules->add($rules->existsIn('company_id', 'Company'), ['errorField' => 'company_id']);
        $rules->add($rules->existsIn('contract_id', 'Contract'), ['errorField' => 'contract_id']);
        return $rules;
    }
}
