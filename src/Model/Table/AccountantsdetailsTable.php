<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Accountantsdetails Model
 *
 * @property \App\Model\Table\AccountantsTable&\Cake\ORM\Association\BelongsTo $Accountants
 * @property \App\Model\Table\DetailsTable&\Cake\ORM\Association\BelongsTo $Details
 *
 * @method \App\Model\Entity\Accountantsdetail newEmptyEntity()
 * @method \App\Model\Entity\Accountantsdetail newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Accountantsdetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Accountantsdetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\Accountantsdetail findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Accountantsdetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Accountantsdetail[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Accountantsdetail|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Accountantsdetail saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Accountantsdetail[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Accountantsdetail[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Accountantsdetail[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Accountantsdetail[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class AccountantsdetailsTable extends Table
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

        $this->setTable('accountantsdetails');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Accountants', [
            'foreignKey' => 'accountants_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Details', [
            'foreignKey' => 'details_id',
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
            ->integer('accountants_id')
            ->requirePresence('accountants_id', 'create')
            ->notEmptyString('accountants_id');

        $validator
            ->integer('details_id')
            ->requirePresence('details_id', 'create')
            ->notEmptyString('details_id');

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
        $rules->add($rules->existsIn('accountants_id', 'Accountants'), ['errorField' => 'accountants_id']);
        $rules->add($rules->existsIn('details_id', 'Details'), ['errorField' => 'details_id']);

        return $rules;
    }
}
