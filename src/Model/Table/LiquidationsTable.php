<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Liquidations Model
 *
 * @property \App\Model\Table\CasinosTable&\Cake\ORM\Association\BelongsTo $Casinos
 * @property \App\Model\Table\MachinesTable&\Cake\ORM\Association\BelongsTo $Machines
 * @property \App\Model\Table\MonthsTable&\Cake\ORM\Association\BelongsTo $Months
 *
 * @method \App\Model\Entity\Liquidation newEmptyEntity()
 * @method \App\Model\Entity\Liquidation newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Liquidation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Liquidation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Liquidation findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Liquidation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Liquidation[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Liquidation|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Liquidation saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Liquidation[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Liquidation[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Liquidation[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Liquidation[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class LiquidationsTable extends Table
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

        $this->setTable('liquidations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Casinos', [
            'foreignKey' => 'casino_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Machines', [
            'foreignKey' => 'machine_id',
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
            ->integer('machine_id')
            ->requirePresence('machine_id', 'create')
            ->notEmptyString('machine_id');

        $validator
            ->integer('month_id')
            ->requirePresence('month_id', 'create')
            ->notEmptyString('month_id');

        $validator
            ->integer('year')
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
            ->scalar('games')
            ->maxLength('games', 255)
            ->requirePresence('games', 'create')
            ->notEmptyString('games');

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
        $rules->add($rules->existsIn('machine_id', 'Machines'), ['errorField' => 'machine_id']);
        $rules->add($rules->existsIn('month_id', 'Month'), ['errorField' => 'month_id']);

        return $rules;
    }
}
