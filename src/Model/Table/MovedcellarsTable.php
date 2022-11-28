<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Movedcellars Model
 *
 * @property \App\Model\Table\CellarsTable&\Cake\ORM\Association\BelongsTo $Cellars
 * @property \App\Model\Table\PartsTable&\Cake\ORM\Association\BelongsTo $Parts
 *
 * @method \App\Model\Entity\Movedcellar newEmptyEntity()
 * @method \App\Model\Entity\Movedcellar newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Movedcellar[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Movedcellar get($primaryKey, $options = [])
 * @method \App\Model\Entity\Movedcellar findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Movedcellar patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Movedcellar[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Movedcellar|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Movedcellar saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Movedcellar[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Movedcellar[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Movedcellar[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Movedcellar[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class MovedcellarsTable extends Table
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

        $this->setTable('movedcellars');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Cellars', [
            'foreignKey' => 'cellar_id',
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
            ->integer('cellar_id')
            ->notEmptyString('cellar_id');

        $validator
            ->integer('part_id')
            ->notEmptyString('part_id');

        $validator
            ->scalar('amount')
            ->maxLength('amount', 255)
            ->requirePresence('amount', 'create')
            ->notEmptyString('amount');

        $validator
            ->date('datemoved')
            ->requirePresence('datemoved', 'create')
            ->notEmptyDate('datemoved');

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
        $rules->add($rules->existsIn('cellar_id', 'Cellars'), ['errorField' => 'cellar_id']);
        $rules->add($rules->existsIn('part_id', 'Parts'), ['errorField' => 'part_id']);

        return $rules;
    }
}
