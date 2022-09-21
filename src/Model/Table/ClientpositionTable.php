<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Clientposition Model
 *
 * @method \App\Model\Entity\Clientposition newEmptyEntity()
 * @method \App\Model\Entity\Clientposition newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Clientposition[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Clientposition get($primaryKey, $options = [])
 * @method \App\Model\Entity\Clientposition findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Clientposition patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Clientposition[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Clientposition|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Clientposition saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Clientposition[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Clientposition[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Clientposition[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Clientposition[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ClientpositionTable extends Table
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

        $this->setTable('clientposition');
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
            ->integer('id')
            ->requirePresence('id', 'create')
            ->notEmptyString('id');

        $validator
            ->scalar('position')
            ->maxLength('position', 255)
            ->requirePresence('position', 'create')
            ->notEmptyString('position');

        return $validator;
    }
}
