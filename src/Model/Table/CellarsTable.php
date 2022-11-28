<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cellars Model
 *
 * @property \App\Model\Table\PartsTable&\Cake\ORM\Association\HasMany $Parts
 *
 * @method \App\Model\Entity\Cellar newEmptyEntity()
 * @method \App\Model\Entity\Cellar newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Cellar[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cellar get($primaryKey, $options = [])
 * @method \App\Model\Entity\Cellar findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Cellar patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Cellar[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cellar|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cellar saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cellar[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Cellar[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Cellar[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Cellar[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CellarsTable extends Table
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

        $this->setTable('cellars');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Parts', [
            'foreignKey' => 'cellar_id',
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        return $validator;
    }
}
