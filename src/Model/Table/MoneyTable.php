<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Money Model
 *
 * @property \App\Model\Table\PartsTable&\Cake\ORM\Association\HasMany $Parts
 * @property \App\Model\Table\ServicesTable&\Cake\ORM\Association\HasMany $Services
 *
 * @method \App\Model\Entity\Money newEmptyEntity()
 * @method \App\Model\Entity\Money newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Money[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Money get($primaryKey, $options = [])
 * @method \App\Model\Entity\Money findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Money patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Money[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Money|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Money saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Money[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Money[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Money[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Money[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class MoneyTable extends Table
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

        $this->setTable('money');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Parts', [
            'foreignKey' => 'money_id',
        ]);
        $this->hasMany('Services', [
            'foreignKey' => 'money_id',
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
            ->scalar('value')
            ->maxLength('value', 255)
            ->requirePresence('value', 'create')
            ->notEmptyString('value');

        $validator
            ->scalar('urlData')
            ->maxLength('urlData', 255)
            ->requirePresence('urlData', 'create')
            ->notEmptyString('urlData');

        return $validator;
    }
}
