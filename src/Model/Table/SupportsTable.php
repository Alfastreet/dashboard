<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Supports Model
 *
 * @property \App\Model\Table\TiketsTable&\Cake\ORM\Association\HasMany $Tikets
 *
 * @method \App\Model\Entity\Support newEmptyEntity()
 * @method \App\Model\Entity\Support newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Support[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Support get($primaryKey, $options = [])
 * @method \App\Model\Entity\Support findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Support patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Support[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Support|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Support saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Support[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Support[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Support[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Support[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class SupportsTable extends Table
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

        $this->setTable('supports');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Tikets', [
            'foreignKey' => 'support_id',
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

        return $validator;
    }
}
