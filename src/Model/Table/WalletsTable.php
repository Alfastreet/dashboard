<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Wallets Model
 *
 * @property \App\Model\Table\AgreementsTable&\Cake\ORM\Association\BelongsTo $Agreements
 *
 * @method \App\Model\Entity\Wallet newEmptyEntity()
 * @method \App\Model\Entity\Wallet newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Wallet[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Wallet get($primaryKey, $options = [])
 * @method \App\Model\Entity\Wallet findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Wallet patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Wallet[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Wallet|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Wallet saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Wallet[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Wallet[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Wallet[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Wallet[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class WalletsTable extends Table
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

        $this->setTable('wallets');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Agreements', [
            'foreignKey' => 'agreement_id',
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
            ->scalar('payment')
            ->maxLength('payment', 255)
            ->requirePresence('payment', 'create')
            ->notEmptyString('payment');

        $validator
            ->scalar('collection')
            ->maxLength('collection', 255)
            ->requirePresence('collection', 'create')
            ->notEmptyString('collection');

        $validator
            ->date('lastpay')
            ->requirePresence('lastpay', 'create')
            ->notEmptyDate('lastpay');

        $validator
            ->scalar('quotemora')
            ->maxLength('quotemora', 255)
            ->requirePresence('quotemora', 'create')
            ->notEmptyString('quotemora');

        $validator
            ->scalar('mora')
            ->maxLength('mora', 255)
            ->requirePresence('mora', 'create')
            ->notEmptyString('mora');

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

        return $rules;
    }
}
