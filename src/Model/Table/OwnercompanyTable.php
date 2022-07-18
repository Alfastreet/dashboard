<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ownercompany Model
 *
 * @property \App\Model\Table\OwnersTable&\Cake\ORM\Association\BelongsTo $Owners
 * @property \App\Model\Table\CompaniesTable&\Cake\ORM\Association\BelongsTo $Companies
 *
 * @method \App\Model\Entity\Ownercompany newEmptyEntity()
 * @method \App\Model\Entity\Ownercompany newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Ownercompany[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ownercompany get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ownercompany findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Ownercompany patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ownercompany[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ownercompany|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ownercompany saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ownercompany[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Ownercompany[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Ownercompany[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Ownercompany[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class OwnercompanyTable extends Table
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

        $this->setTable('ownercompany');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Owner', [
            'foreignKey' => 'owner_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Company', [
            'foreignKey' => 'company_id',
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
            ->integer('owner_id')
            ->requirePresence('owner_id', 'create')
            ->notEmptyString('owner_id');

        $validator
            ->integer('company_id')
            ->requirePresence('company_id', 'create')
            ->notEmptyString('company_id');

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
        $rules->add($rules->existsIn('owner_id', 'Owner'), ['errorField' => 'owner_id']);
        $rules->add($rules->existsIn('company_id', 'Company'), ['errorField' => 'company_id']);

        return $rules;
    }
}
