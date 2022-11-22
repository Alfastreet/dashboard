<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


/**
 * Casinos Model
 *
 * @property \App\Model\Table\CitiesTable&\Cake\ORM\Association\BelongsTo $Cities
 * @property \App\Model\Table\StatesTable&\Cake\ORM\Association\BelongsTo $States
 * @property \App\Model\Table\OwnersTable&\Cake\ORM\Association\BelongsTo $Owners
 * @property \App\Model\Table\CompaniesTable&\Cake\ORM\Association\BelongsTo $Companies
 * @property \App\Model\Table\ClientscasinosTable&\Cake\ORM\Association\HasMany $Clientscasinos
 * @property \App\Model\Table\MachinesTable&\Cake\ORM\Association\HasMany $Machines
 *
 * @method \App\Model\Entity\Casino newEmptyEntity()
 * @method \App\Model\Entity\Casino newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Casino[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Casino get($primaryKey, $options = [])
 * @method \App\Model\Entity\Casino findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Casino patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Casino[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Casino|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Casino saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Casino[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Casino[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Casino[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Casino[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CasinosTable extends Table
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

        $this->setTable('casinos');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('City', [
            'foreignKey' => 'city_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('State', [
            'foreignKey' => 'state_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Owner', [
            'foreignKey' => 'owner_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Business', [
            'foreignKey' => 'business_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Clientscasinos', [
            'foreignKey' => 'casino_id',
        ]);
        $this->hasMany('Machines', [
            'foreignKey' => 'casino_id',
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
            ->scalar('phone')
            ->maxLength('phone', 255)
            ->requirePresence('phone', 'create')
            ->notEmptyString('phone');

        $validator
            ->scalar('address')
            ->maxLength('address', 255)
            ->requirePresence('address', 'create')
            ->notEmptyString('address');

        $validator
            ->integer('city_id')
            ->requirePresence('city_id', 'create')
            ->notEmptyString('city_id');

        $validator
            ->integer('state_id')
            ->requirePresence('state_id', 'create')
            ->notEmptyString('state_id');

        $validator
            ->integer('owner_id')
            ->requirePresence('owner_id', 'create')
            ->notEmptyString('owner_id');

        $validator
            ->integer('business_id')
            ->requirePresence('business_id', 'create')
            ->notEmptyString('business_id');

        $validator
            ->scalar('image')
            ->maxLength('image', 255)
            ->requirePresence('image', 'create')
            ->notEmptyFile('image');

        $validator
            ->scalar('token')
            ->maxLength('token', 255)
            ->requirePresence('token', 'create')
            ->notEmptyFile('token');

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
        $rules->add($rules->existsIn('city_id', 'City'), ['errorField' => 'city_id']);
        $rules->add($rules->existsIn('state_id', 'State'), ['errorField' => 'state_id']);
        $rules->add($rules->existsIn('owner_id', 'Owner'), ['errorField' => 'owner_id']);
        $rules->add($rules->existsIn('business_id', 'Business'), ['errorField' => 'company_id']);

        return $rules;
    }
}
