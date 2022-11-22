<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Installments Model
 *
 * @property \App\Model\Table\QuotesTable&\Cake\ORM\Association\BelongsTo $Quotes
 *
 * @method \App\Model\Entity\Installment newEmptyEntity()
 * @method \App\Model\Entity\Installment newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Installment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Installment get($primaryKey, $options = [])
 * @method \App\Model\Entity\Installment findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Installment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Installment[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Installment|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Installment saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Installment[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Installment[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Installment[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Installment[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class InstallmentsTable extends Table
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

        $this->setTable('installments');
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
            ->notEmptyString('quote_id');

        $validator
            ->date('dateinstallment')
            ->requirePresence('dateinstallment', 'create')
            ->notEmptyDate('dateinstallment');

        $validator
            ->scalar('guide')
            ->maxLength('guide', 255)
            ->allowEmptyString('guide');

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
        $rules->add($rules->existsIn('quote_id', 'Quotes'), ['errorField' => 'quote_id']);

        return $rules;
    }
}
