<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Totalaccountants Model
 *
 * @property \App\Model\Table\CasinosTable&\Cake\ORM\Association\BelongsTo $Casinos
 *
 * @method \App\Model\Entity\Totalaccountant newEmptyEntity()
 * @method \App\Model\Entity\Totalaccountant newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Totalaccountant[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Totalaccountant get($primaryKey, $options = [])
 * @method \App\Model\Entity\Totalaccountant findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Totalaccountant patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Totalaccountant[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Totalaccountant|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Totalaccountant saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Totalaccountant[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Totalaccountant[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Totalaccountant[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Totalaccountant[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TotalaccountantsTable extends Table
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

        $this->setTable('totalaccountants');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Casinos', [
            'foreignKey' => 'casino_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Month', [
            'foreignKey' => 'month_id',
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
            ->integer('casino_id')
            ->requirePresence('casino_id', 'create')
            ->notEmptyString('casino_id');

        $validator
            ->integer('month_id')
            ->requirePresence('month_id', 'create')
            ->notEmptyString('month_id');

        $validator
            ->scalar('year')
            ->maxLength('year', 255)
            ->requirePresence('year', 'create')
            ->notEmptyString('year');

        $validator
            ->scalar('totalLiquidation')
            ->maxLength('totalLiquidation', 255)
            ->requirePresence('totalLiquidation', 'create')
            ->notEmptyString('totalLiquidation');

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
        $rules->add($rules->existsIn('casino_id', 'Casinos'), ['errorField' => 'casino_id']);
        $rules->add($rules->existsIn('month_id', 'Months'), ['errorField' => 'month_id']);

        return $rules;
    }
}
