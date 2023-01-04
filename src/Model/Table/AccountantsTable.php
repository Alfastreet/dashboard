<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Accountants Model
 *
 * @property \App\Model\Table\MachinesTable&\Cake\ORM\Association\BelongsTo $Machines
 * @property \App\Model\Table\CasinosTable&\Cake\ORM\Association\BelongsTo $Casinos
 * @property \App\Model\Table\MonthsTable&\Cake\ORM\Association\BelongsTo $Months
 *
 * @method \App\Model\Entity\Accountant newEmptyEntity()
 * @method \App\Model\Entity\Accountant newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Accountant[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Accountant get($primaryKey, $options = [])
 * @method \App\Model\Entity\Accountant findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Accountant patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Accountant[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Accountant|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Accountant saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Accountant[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Accountant[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Accountant[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Accountant[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class AccountantsTable extends Table
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

        $this->setTable('accountants');
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
            ->integer('machine_id')
            ->notEmptyString('machine_id');

        $validator
            ->integer('casino_id')
            ->notEmptyString('casino_id');

        $validator
            ->date('day_init')
            ->requirePresence('day_init', 'create')
            ->notEmptyDate('day_init');

        $validator
            ->date('day_end')
            ->requirePresence('day_end', 'create')
            ->notEmptyDate('day_end');

        $validator
            ->integer('month_id')
            ->notEmptyString('month_id');

        $validator
            ->scalar('year')
            ->maxLength('year', 255)
            ->requirePresence('year', 'create')
            ->notEmptyString('year');

        $validator
            ->scalar('cashin')
            ->maxLength('cashin', 255)
            ->requirePresence('cashin', 'create')
            ->notEmptyString('cashin');

        $validator
            ->scalar('cashout')
            ->maxLength('cashout', 255)
            ->requirePresence('cashout', 'create')
            ->notEmptyString('cashout');

        $validator
            ->scalar('bet')
            ->maxLength('bet', 255)
            ->requirePresence('bet', 'create')
            ->notEmptyString('bet');

        $validator
            ->scalar('win')
            ->maxLength('win', 255)
            ->requirePresence('win', 'create')
            ->notEmptyString('win');

        $validator
            ->scalar('profit')
            ->maxLength('profit', 255)
            ->requirePresence('profit', 'create')
            ->notEmptyString('profit');

        $validator
            ->scalar('jackpot')
            ->maxLength('jackpot', 255)
            ->requirePresence('jackpot', 'create')
            ->notEmptyString('jackpot');

        $validator
            ->scalar('gamesplayed')
            ->maxLength('gamesplayed', 255)
            ->requirePresence('gamesplayed', 'create')
            ->notEmptyString('gamesplayed');

        $validator
            ->scalar('coljuegos')
            ->maxLength('coljuegos', 255)
            ->requirePresence('coljuegos', 'create')
            ->notEmptyString('coljuegos');

        $validator
            ->scalar('admin')
            ->maxLength('admin', 255)
            ->requirePresence('admin', 'create')
            ->notEmptyString('admin');

        $validator
            ->scalar('total')
            ->maxLength('total', 255)
            ->requirePresence('total', 'create')
            ->notEmptyString('total');

        $validator
            ->scalar('alfastreet')
            ->maxLength('alfastreet', 255)
            ->requirePresence('alfastreet', 'create')
            ->notEmptyString('alfastreet');

        $validator
            ->scalar('image')
            ->maxLength('image', 255)
            ->requirePresence('image', 'create')
            ->notEmptyFile('image');

        $validator
            ->scalar('totaldays')
            ->maxLength('totaldays', 255)
            ->requirePresence('totaldays', 'create')
            ->notEmptyString('totaldays');

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
        $rules->add($rules->existsIn('casino_id', 'Casinos'), ['errorField' => 'casino_id']);
        $rules->add($rules->existsIn('month_id', 'Months'), ['errorField' => 'month_id']);

        return $rules;
    }
}
