<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tikets Model
 *
 * @property \App\Model\Table\MachinesTable&\Cake\ORM\Association\BelongsTo $Machines
 * @property \App\Model\Table\SupportsTable&\Cake\ORM\Association\BelongsTo $Supports
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Tiket newEmptyEntity()
 * @method \App\Model\Entity\Tiket newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Tiket[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tiket get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tiket findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Tiket patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tiket[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tiket|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tiket saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tiket[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tiket[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tiket[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tiket[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TiketsTable extends Table
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

        $this->setTable('tikets');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Machines', [
            'foreignKey' => 'machine_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Supports', [
            'foreignKey' => 'support_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Quotes', [
            'foreignKey' => 'tiket_id',
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
            ->integer('machine_id')
            ->allowEmptyString('machine_id');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 255)
            ->requirePresence('phone', 'create')
            ->notEmptyString('phone');

        $validator
            ->scalar('comments')
            ->maxLength('comments', 4294967295)
            ->requirePresence('comments', 'create')
            ->notEmptyString('comments');

        $validator
            ->date('datecreate')
            ->requirePresence('datecreate', 'create')
            ->notEmptyDate('datecreate');

        $validator
            ->scalar('status')
            ->maxLength('status', 255)
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        $validator
            ->scalar('resolved')
            ->maxLength('resolved', 255)
            ->requirePresence('resolved', 'create')
            ->notEmptyString('resolved');

        $validator
            ->integer('support_id')
            ->allowEmptyString('support_id');

        $validator
            ->scalar('name_client')
            ->maxLength('name_client', 255)
            ->allowEmptyString('name_client');

        $validator
            ->integer('user_id')
            ->allowEmptyString('user_id');

        $validator
            ->date('dateresolved')
            ->allowEmptyDate('dateresolved');

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
        $rules->add($rules->existsIn('machine_id', 'Machines'), ['errorField' => 'machine_id']);
        $rules->add($rules->existsIn('support_id', 'Supports'), ['errorField' => 'support_id']);
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
