<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Model Model
 *
 * @property \App\Model\Table\MachinesTable&\Cake\ORM\Association\HasMany $Machines
 *
 * @method \App\Model\Entity\Model newEmptyEntity()
 * @method \App\Model\Entity\Model newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Model[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Model get($primaryKey, $options = [])
 * @method \App\Model\Entity\Model findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Model patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Model[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Model|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Model saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Model[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Model[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Model[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Model[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ModelTable extends Table
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

        $this->setTable('model');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Machines', [
            'foreignKey' => 'model_id',
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
