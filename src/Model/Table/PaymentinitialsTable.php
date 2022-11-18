<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Paymentinitials Model
 *
 * @property \App\Model\Table\AgreementsTable&\Cake\ORM\Association\BelongsTo $Agreements
 * @property \App\Model\Table\DestiniesTable&\Cake\ORM\Association\BelongsTo $Destinies
 *
 * @method \App\Model\Entity\Paymentinitial newEmptyEntity()
 * @method \App\Model\Entity\Paymentinitial newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Paymentinitial[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Paymentinitial get($primaryKey, $options = [])
 * @method \App\Model\Entity\Paymentinitial findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Paymentinitial patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Paymentinitial[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Paymentinitial|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Paymentinitial saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Paymentinitial[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Paymentinitial[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Paymentinitial[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Paymentinitial[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PaymentinitialsTable extends Table
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

        $this->setTable('paymentinitials');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Agreements', [
            'foreignKey' => 'agreement_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Destinies', [
            'foreignKey' => 'destiny_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Banks', [
            'foreignKey' => 'bank_id',
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
            ->integer('agreement_id')
            ->notEmptyString('agreement_id');

        $validator
            ->scalar('valuequote')
            ->maxLength('valuequote', 255)
            ->requirePresence('valuequote', 'create')
            ->notEmptyString('valuequote');

        $validator
            ->date('datepayment')
            ->requirePresence('datepayment', 'create')
            ->notEmptyDate('datepayment');

        $validator
            ->scalar('trm')
            ->maxLength('trm', 255)
            ->requirePresence('trm', 'create')
            ->notEmptyString('trm');

        $validator
            ->scalar('cop')
            ->maxLength('cop', 255)
            ->requirePresence('cop', 'create')
            ->notEmptyString('cop');

        $validator
            ->integer('destiny_id')
            ->notEmptyString('destiny_id');

        $validator
            ->integer('bank_id')
            ->notEmptyString('bank_id');

        $validator
            ->scalar('referencepay')
            ->maxLength('referencepay', 255)
            ->requirePresence('referencepay', 'create')
            ->notEmptyString('referencepay');

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
        $rules->add($rules->existsIn('agreement_id', 'Agreements'), ['errorField' => 'agreement_id']);
        $rules->add($rules->existsIn('destiny_id', 'Destinies'), ['errorField' => 'destiny_id']);
        $rules->add($rules->existsIn('bank_id', 'Banks'), ['errorField' => 'bank_id']);

        return $rules;
    }
}
