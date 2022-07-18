<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Clientscasinos Model
 *
 * @property \App\Model\Table\ClientsTable&\Cake\ORM\Association\BelongsTo $Clients
 * @property \App\Model\Table\CasinosTable&\Cake\ORM\Association\BelongsTo $Casinos
 *
 * @method \App\Model\Entity\Clientscasino newEmptyEntity()
 * @method \App\Model\Entity\Clientscasino newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Clientscasino[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Clientscasino get($primaryKey, $options = [])
 * @method \App\Model\Entity\Clientscasino findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Clientscasino patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Clientscasino[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Clientscasino|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Clientscasino saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Clientscasino[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Clientscasino[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Clientscasino[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Clientscasino[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ClientscasinosTable extends Table
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

        $this->setTable('clientscasinos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Client', [
            'foreignKey' => 'client_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Casinos', [
            'foreignKey' => 'casino_id',
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
            ->integer('client_id')
            ->requirePresence('client_id', 'create')
            ->notEmptyString('client_id');

        $validator
            ->integer('casino_id')
            ->requirePresence('casino_id', 'create')
            ->notEmptyString('casino_id');

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
        $rules->add($rules->existsIn('client_id', 'Client'), ['errorField' => 'client_id']);
        $rules->add($rules->existsIn('casino_id', 'Casinos'), ['errorField' => 'casino_id']);

        return $rules;
    }
}
