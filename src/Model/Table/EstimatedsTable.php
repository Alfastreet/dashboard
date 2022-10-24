<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Estimateds Model
 *
 * @property \App\Model\Table\AgreementsTable&\Cake\ORM\Association\BelongsTo $Agreements
 *
 * @method \App\Model\Entity\Estimated newEmptyEntity()
 * @method \App\Model\Entity\Estimated newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Estimated[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Estimated get($primaryKey, $options = [])
 * @method \App\Model\Entity\Estimated findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Estimated patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Estimated[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Estimated|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Estimated saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Estimated[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Estimated[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Estimated[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Estimated[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class EstimatedsTable extends Table
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

        $this->setTable('estimateds');
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
            ->scalar('quotevalue')
            ->maxLength('quotevalue', 255)
            ->requirePresence('quotevalue', 'create')
            ->notEmptyString('quotevalue');

        $validator
            ->scalar('nquote')
            ->maxLength('nquote', 255)
            ->requirePresence('nquote', 'create')
            ->notEmptyString('nquote');

        $validator
            ->date('dateend')
            ->allowEmptyDate('dateend');

        $validator
            ->date('dateinit')
            ->allowEmptyDate('dateinit');

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
