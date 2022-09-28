<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Quotestatuses Model
 *
 * @property \App\Model\Table\QuotesTable&\Cake\ORM\Association\BelongsTo $Quotes
 *
 * @method \App\Model\Entity\Quotestatus newEmptyEntity()
 * @method \App\Model\Entity\Quotestatus newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Quotestatus[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Quotestatus get($primaryKey, $options = [])
 * @method \App\Model\Entity\Quotestatus findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Quotestatus patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Quotestatus[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Quotestatus|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Quotestatus saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Quotestatus[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Quotestatus[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Quotestatus[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Quotestatus[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class QuotestatusesTable extends Table
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

        $this->setTable('quotestatuses');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Quotes', [
            'foreignKey' => 'quote_id',
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
            ->integer('quote_id')
            ->requirePresence('quote_id', 'create')
            ->notEmptyString('quote_id');

        $validator
            ->integer('status_id')
            ->requirePresence('status_id', 'create')
            ->notEmptyString('status_id');

        $validator
            ->scalar('comment')
            ->maxLength('comment', 4294967295)
            ->allowEmptyString('comment');

        $validator
            ->integer('invoice')
            ->allowEmptyString('invoice')
            ->add('invoice', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['invoice'], ['allowMultipleNulls' => true]), ['errorField' => 'invoice']);
        $rules->add($rules->existsIn('quote_id', 'Quotes'), ['errorField' => 'quote_id']);

        return $rules;
    }
}
