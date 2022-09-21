<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Typeproduct Model
 *
 * @method \App\Model\Entity\Typeproduct newEmptyEntity()
 * @method \App\Model\Entity\Typeproduct newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Typeproduct[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Typeproduct get($primaryKey, $options = [])
 * @method \App\Model\Entity\Typeproduct findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Typeproduct patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Typeproduct[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Typeproduct|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Typeproduct saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Typeproduct[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Typeproduct[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Typeproduct[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Typeproduct[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TypeproductTable extends Table
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

        $this->setTable('typeproduct');
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
            ->scalar('type')
            ->maxLength('type', 255)
            ->requirePresence('type', 'create')
            ->notEmptyString('type');

        return $validator;
    }
}
