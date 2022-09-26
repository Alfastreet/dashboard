<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Erases Model
 *
 * @property \App\Model\Table\MachinesTable&\Cake\ORM\Association\BelongsTo $Machines
 * @property \App\Model\Table\MonthsTable&\Cake\ORM\Association\BelongsTo $Months
 *
 * @method \App\Model\Entity\Erase newEmptyEntity()
 * @method \App\Model\Entity\Erase newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Erase[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Erase get($primaryKey, $options = [])
 * @method \App\Model\Entity\Erase findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Erase patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Erase[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Erase|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Erase saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Erase[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Erase[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Erase[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Erase[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ErasesTable extends Table
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

        $this->setTable('erases');
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
        $this->belongsTo('Month', [
            'foreignKey' => 'month_id',
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
            ->integer('details_id')
            ->requirePresence('details_id', 'create')
            ->notEmptyString('details_id');

        $validator
            ->scalar('image')
            ->maxLength('image', 255)
            ->allowEmptyFile('image');

        $validator
            ->scalar('alfastreet')
            ->maxLength('alfastreet', 255)
            ->allowEmptyString('alfastreet');

        $validator
            ->scalar('total')
            ->maxLength('total', 255)
            ->allowEmptyString('total');

        $validator
            ->scalar('admin')
            ->maxLength('admin', 255)
            ->allowEmptyString('admin');

        $validator
            ->scalar('coljuegos')
            ->maxLength('coljuegos', 255)
            ->allowEmptyString('coljuegos');

        $validator
            ->scalar('gamesplayed')
            ->maxLength('gamesplayed', 255)
            ->allowEmptyString('gamesplayed');

        $validator
            ->scalar('jackpot')
            ->maxLength('jackpot', 255)
            ->allowEmptyString('jackpot');

        $validator
            ->scalar('profit')
            ->maxLength('profit', 255)
            ->allowEmptyString('profit');

        $validator
            ->scalar('win')
            ->maxLength('win', 255)
            ->allowEmptyString('win');

        $validator
            ->scalar('bet')
            ->maxLength('bet', 255)
            ->allowEmptyString('bet');

        $validator
            ->scalar('cashout')
            ->maxLength('cashout', 255)
            ->allowEmptyString('cashout');

        $validator
            ->scalar('cashin')
            ->maxLength('cashin', 255)
            ->allowEmptyString('cashin');

        $validator
            ->scalar('year')
            ->maxLength('year', 255)
            ->allowEmptyString('year');

        $validator
            ->integer('month_id')
            ->allowEmptyString('month_id');

        $validator
            ->scalar('day_end')
            ->maxLength('day_end', 255)
            ->allowEmptyString('day_end');

        $validator
            ->scalar('day_init')
            ->maxLength('day_init', 255)
            ->allowEmptyString('day_init');

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
        $rules->add($rules->existsIn('month_id', 'Month'), ['errorField' => 'month_id']);

        return $rules;
    }
}
