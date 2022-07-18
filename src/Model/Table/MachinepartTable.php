<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Machinepart Model
 *
 * @property \App\Model\Table\MachinesTable&\Cake\ORM\Association\BelongsTo $Machines
 * @property \App\Model\Table\PartsTable&\Cake\ORM\Association\BelongsTo $Parts
 *
 * @method \App\Model\Entity\Machinepart newEmptyEntity()
 * @method \App\Model\Entity\Machinepart newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Machinepart[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Machinepart get($primaryKey, $options = [])
 * @method \App\Model\Entity\Machinepart findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Machinepart patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Machinepart[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Machinepart|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Machinepart saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Machinepart[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Machinepart[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Machinepart[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Machinepart[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class MachinepartTable extends Table
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

        $this->setTable('machinepart');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Machines', [
            'foreignKey' => 'machine_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Parts', [
            'foreignKey' => 'part_id',
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
            ->requirePresence('machine_id', 'create')
            ->notEmptyString('machine_id');

        $validator
            ->integer('part_id')
            ->requirePresence('part_id', 'create')
            ->notEmptyString('part_id');

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
        $rules->add($rules->existsIn('part_id', 'Parts'), ['errorField' => 'part_id']);

        return $rules;
    }
}
