<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Liquidation Model
 *
 * @property \App\Model\Table\AccountantsTable&\Cake\ORM\Association\BelongsTo $Accountants
 * @property \App\Model\Table\AccountantsstatusesTable&\Cake\ORM\Association\BelongsTo $Accountantsstatuses
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
class LiquidationTable extends Table
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

        $this->setTable('liquidation');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Accountants', [
            'foreignKey' => 'accountants_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Accountantsstatus', [
            'foreignKey' => 'accountantsstatus_id',
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
            ->integer('accountants_id')
            ->requirePresence('accountants_id', 'create')
            ->notEmptyString('accountants_id');

        $validator
            ->scalar('total')
            ->maxLength('total', 255)
            ->requirePresence('total', 'create')
            ->notEmptyString('total');

        $validator
            ->integer('accountantsstatus_id')
            ->requirePresence('accountantsstatus_id', 'create')
            ->notEmptyString('accountantsstatus_id');

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
        $rules->add($rules->existsIn('accountants_id', 'Accountants'), ['errorField' => 'accountants_id']);
        $rules->add($rules->existsIn('accountantsstatus_id', 'Accountantsstatus'), ['errorField' => 'accountantsstatus_id']);

        return $rules;
    }
}
