<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Detailsaccountants Model
 *
 * @property \App\Model\Table\AccountantsTable&\Cake\ORM\Association\BelongsTo $Accountants
 *
 * @method \App\Model\Entity\Detailsaccountant newEmptyEntity()
 * @method \App\Model\Entity\Detailsaccountant newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Detailsaccountant[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Detailsaccountant get($primaryKey, $options = [])
 * @method \App\Model\Entity\Detailsaccountant findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Detailsaccountant patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Detailsaccountant[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Detailsaccountant|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Detailsaccountant saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Detailsaccountant[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Detailsaccountant[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Detailsaccountant[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Detailsaccountant[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class DetailsaccountantsTable extends Table
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

        $this->setTable('detailsaccountants');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Accountants', [
            'foreignKey' => 'accountants_id',
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
            ->integer('day_init')
            ->requirePresence('day_init', 'create')
            ->notEmptyString('day_init');

        $validator
            ->integer('day_end')
            ->requirePresence('day_end', 'create')
            ->notEmptyString('day_end');

        $validator
            ->integer('month')
            ->requirePresence('month', 'create')
            ->notEmptyString('month');

        $validator
            ->integer('year')
            ->requirePresence('year', 'create')
            ->notEmptyString('year');

        $validator
            ->scalar('total_init')
            ->maxLength('total_init', 255)
            ->requirePresence('total_init', 'create')
            ->notEmptyString('total_init');

        $validator
            ->scalar('total_end')
            ->maxLength('total_end', 255)
            ->requirePresence('total_end', 'create')
            ->notEmptyString('total_end');

        $validator
            ->scalar('profit')
            ->maxLength('profit', 255)
            ->requirePresence('profit', 'create')
            ->notEmptyString('profit');

        $validator
            ->scalar('coljuegoa')
            ->maxLength('coljuegoa', 255)
            ->requirePresence('coljuegoa', 'create')
            ->notEmptyString('coljuegoa');

        $validator
            ->scalar('iva')
            ->maxLength('iva', 255)
            ->requirePresence('iva', 'create')
            ->notEmptyString('iva');

        $validator
            ->scalar('juegos_jug')
            ->maxLength('juegos_jug', 255)
            ->requirePresence('juegos_jug', 'create')
            ->notEmptyString('juegos_jug');

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

        return $rules;
    }
}
