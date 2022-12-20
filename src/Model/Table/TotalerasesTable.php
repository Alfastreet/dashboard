<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Totalerases Model
 *
 * @property \App\Model\Table\CasinosTable&\Cake\ORM\Association\BelongsTo $Casinos
 * @property \App\Model\Table\MonthsTable&\Cake\ORM\Association\BelongsTo $Months
 *
 * @method \App\Model\Entity\Totalerase newEmptyEntity()
 * @method \App\Model\Entity\Totalerase newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Totalerase[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Totalerase get($primaryKey, $options = [])
 * @method \App\Model\Entity\Totalerase findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Totalerase patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Totalerase[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Totalerase|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Totalerase saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Totalerase[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Totalerase[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Totalerase[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Totalerase[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TotalerasesTable extends Table
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

        $this->setTable('totalerases');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Casinos', [
            'foreignKey' => 'casino_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Months', [
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
            ->scalar('total')
            ->maxLength('total', 255)
            ->requirePresence('total', 'create')
            ->notEmptyString('total');

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
