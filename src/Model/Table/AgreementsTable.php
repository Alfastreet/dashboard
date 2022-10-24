<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Agreements Model
 *
 * @property \App\Model\Table\MachinesTable&\Cake\ORM\Association\BelongsTo $Machines
 * @property \App\Model\Table\AgreementstatusesTable&\Cake\ORM\Association\BelongsTo $Agreementstatuses
 *
 * @method \App\Model\Entity\Agreement newEmptyEntity()
 * @method \App\Model\Entity\Agreement newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Agreement[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Agreement get($primaryKey, $options = [])
 * @method \App\Model\Entity\Agreement findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Agreement patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Agreement[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Agreement|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Agreement saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Agreement[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Agreement[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Agreement[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Agreement[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class AgreementsTable extends Table
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

        $this->setTable('agreements');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Business', [
            'foreignKey' => 'business_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Client', [
            'foreignKey' => 'client_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Machines', [
            'foreignKey' => 'machine_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Agreementstatuses', [
            'foreignKey' => 'agreementstatus_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Estimateds', [
            'foreignKey' => 'agreement_id',
        ]);
        $this->hasMany('Payments', [
            'foreignKey' => 'agreement_id',
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
            ->integer('client_id')
            ->requirePresence('client_id', 'create')
            ->notEmptyString('client_id');

        $validator
            ->integer('business_id')
            ->requirePresence('business_id', 'create')
            ->notEmptyString('business_id');

        $validator
            ->integer('machine_id')
            ->notEmptyString('machine_id');

        $validator
            ->scalar('discount')
            ->maxLength('discount', 255)
            ->requirePresence('discount', 'create')
            ->notEmptyString('discount');

        $validator
            ->scalar('agreementvalue')
            ->maxLength('agreementvalue', 255)
            ->requirePresence('agreementvalue', 'create')
            ->notEmptyString('agreementvalue');

        $validator
            ->scalar('nquote')
            ->maxLength('nquote', 255)
            ->requirePresence('nquote', 'create')
            ->notEmptyString('nquote');

        $validator
            ->scalar('quoteini')
            ->maxLength('quoteini', 255)
            ->requirePresence('quoteini', 'create')
            ->notEmptyString('quoteini');

        $validator
            ->scalar('separation')
            ->maxLength('separation', 255)
            ->requirePresence('separation', 'create')
            ->notEmptyString('separation');

        $validator
            ->integer('agreementstatus_id')
            ->notEmptyString('agreementstatus_id');

        $validator
            ->date('datesigned')
            ->allowEmptyDate('datesigned');

        $validator
            ->scalar('comments')
            ->maxLength('comments', 4294967295)
            ->requirePresence('comments', 'create')
            ->notEmptyString('comments');

        $validator
            ->scalar('percentinicial')
            ->maxLength('percentinicial', 255)
            ->allowEmptyString('percentinicial');

        $validator
            ->scalar('quotevalue')
            ->maxLength('quotevalue', 255)
            ->allowEmptyString('quotevalue');

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
        $rules->add($rules->existsIn('client_id', 'Client'), ['errorField' => 'client_id']);
        $rules->add($rules->existsIn('business_id', 'Business'), ['errorField' => 'business_id']);
        $rules->add($rules->existsIn('machine_id', 'Machines'), ['errorField' => 'machine_id']);
        $rules->add($rules->existsIn('agreementstatus_id', 'Agreementstatuses'), ['errorField' => 'agreementstatus_id']);

        return $rules;
    }
}
