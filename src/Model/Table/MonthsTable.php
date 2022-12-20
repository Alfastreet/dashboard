<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Month Model
 *
 * @method \App\Model\Entity\Month newEmptyEntity()
 * @method \App\Model\Entity\Month newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Month[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Month get($primaryKey, $options = [])
 * @method \App\Model\Entity\Month findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Month patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Month[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Month|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Month saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Month[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Month[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Month[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Month[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class MonthsTable extends Table
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

        $this->setTable('months');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->scalar('month')
            ->maxLength('month', 255)
            ->requirePresence('month', 'create')
            ->notEmptyString('month');

        return $validator;
    }
}
