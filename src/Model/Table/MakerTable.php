<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Maker Model
 *
 * @property \App\Model\Table\MachinesTable&\Cake\ORM\Association\HasMany $Machines
 *
 * @method \App\Model\Entity\Maker newEmptyEntity()
 * @method \App\Model\Entity\Maker newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Maker[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Maker get($primaryKey, $options = [])
 * @method \App\Model\Entity\Maker findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Maker patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Maker[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Maker|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Maker saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Maker[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Maker[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Maker[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Maker[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class MakerTable extends Table
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

        $this->setTable('maker');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Machines', [
            'foreignKey' => 'maker_id',
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
