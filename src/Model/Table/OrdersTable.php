<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Orders Model
 *
 * @property \App\Model\Table\OrdersTable&\Cake\ORM\Association\BelongsTo $Orders
 * @property \App\Model\Table\QuotesTable&\Cake\ORM\Association\BelongsTo $Quotes
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\OrderstatusesTable&\Cake\ORM\Association\BelongsTo $Orderstatuses
 * @property \App\Model\Table\MachinesTable&\Cake\ORM\Association\BelongsTo $Machines
 * @property \App\Model\Table\OrdersTable&\Cake\ORM\Association\HasMany $Orders
 *
 * @method \App\Model\Entity\Order newEmptyEntity()
 * @method \App\Model\Entity\Order newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Order[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Order get($primaryKey, $options = [])
 * @method \App\Model\Entity\Order findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Order patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Order[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Order|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Order saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Order[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Order[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Order[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Order[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class OrdersTable extends Table
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

        $this->setTable('orders');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Quotes', [
            'foreignKey' => 'quote_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Orderstatuses', [
            'foreignKey' => 'orderstatus_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Client', [
            'foreignKey' => 'client_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Machines', [
            'foreignKey' => 'machine_id',
        ]);
        $this->hasMany('Orders', [
            'foreignKey' => 'order_id',
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
            ->integer('order_id')
            ->requirePresence('order_id', 'create')
            ->notEmptyString('order_id')
            ->add('order_id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->integer('quote_id')
            ->requirePresence('quote_id', 'create')
            ->notEmptyString('quote_id');

        $validator
            ->integer('user_id')
            ->requirePresence('user_id', 'create')
            ->notEmptyString('user_id');

        $validator
            ->integer('client_id')
            ->requirePresence('client_id', 'create')
            ->notEmptyString('client_id');

        $validator
            ->scalar('comments')
            ->maxLength('comments', 4294967295)
            ->allowEmptyString('comments');

        $validator
            ->integer('orderstatus_id')
            ->requirePresence('orderstatus_id', 'create')
            ->notEmptyString('orderstatus_id');

        $validator
            ->integer('machine_id')
            ->allowEmptyString('machine_id');

        $validator
            ->scalar('x2max')
            ->maxLength('x2max', 255)
            ->allowEmptyString('x2max');

        $validator
            ->scalar('x3max')
            ->maxLength('x3max', 255)
            ->allowEmptyString('x3max');

        $validator
            ->scalar('x6max')
            ->maxLength('x6max', 255)
            ->allowEmptyString('x6max');

        $validator
            ->scalar('x7max')
            ->maxLength('x7max', 255)
            ->allowEmptyString('x7max');

        $validator
            ->scalar('x9max')
            ->maxLength('x9max', 255)
            ->allowEmptyString('x9max');

        $validator
            ->scalar('x12max')
            ->maxLength('x12max', 255)
            ->allowEmptyString('x12max');

        $validator
            ->scalar('x18max')
            ->maxLength('x18max', 255)
            ->allowEmptyString('x18max');

        $validator
            ->scalar('x36max')
            ->maxLength('x36max', 255)
            ->allowEmptyString('x36max');

        $validator
            ->scalar('exteriormax')
            ->maxLength('exteriormax', 255)
            ->allowEmptyString('exteriormax');

        $validator
            ->scalar('interiormax')
            ->maxLength('interiormax', 255)
            ->allowEmptyString('interiormax');

        $validator
            ->scalar('totalmax')
            ->maxLength('totalmax', 255)
            ->allowEmptyString('totalmax');

        $validator
            ->scalar('x2min')
            ->maxLength('x2min', 255)
            ->allowEmptyString('x2min');

        $validator
            ->scalar('x3min')
            ->maxLength('x3min', 255)
            ->allowEmptyString('x3min');

        $validator
            ->scalar('x6min')
            ->maxLength('x6min', 255)
            ->allowEmptyString('x6min');

        $validator
            ->scalar('x7min')
            ->maxLength('x7min', 255)
            ->allowEmptyString('x7min');

        $validator
            ->scalar('x9min')
            ->maxLength('x9min', 255)
            ->allowEmptyString('x9min');

        $validator
            ->scalar('x12min')
            ->maxLength('x12min', 255)
            ->allowEmptyString('x12min');

        $validator
            ->scalar('x18min')
            ->maxLength('x18min', 255)
            ->allowEmptyString('x18min');

        $validator
            ->scalar('x36min')
            ->maxLength('x36min', 255)
            ->allowEmptyString('x36min');

        $validator
            ->scalar('exteriormin')
            ->maxLength('exteriormin', 255)
            ->allowEmptyString('exteriormin');

        $validator
            ->scalar('interiormin')
            ->maxLength('interiormin', 255)
            ->allowEmptyString('interiormin');

        $validator
            ->scalar('totalmin')
            ->maxLength('totalmin', 255)
            ->allowEmptyString('totalmin');

        $validator
            ->scalar('limitmax')
            ->maxLength('limitmax', 255)
            ->allowEmptyString('limitmax');

        $validator
            ->scalar('apuestamin')
            ->maxLength('apuestamin', 255)
            ->allowEmptyString('apuestamin');

        $validator
            ->scalar('fecuenciafin')
            ->maxLength('fecuenciafin', 255)
            ->allowEmptyString('fecuenciafin');

        $validator
            ->scalar('frecuenciaini')
            ->maxLength('frecuenciaini', 255)
            ->allowEmptyString('frecuenciaini');

        $validator
            ->scalar('hiddenper')
            ->maxLength('hiddenper', 255)
            ->allowEmptyString('hiddenper');

        $validator
            ->scalar('apuestaper')
            ->maxLength('apuestaper', 255)
            ->allowEmptyString('apuestaper');

        $validator
            ->scalar('timeapuesta')
            ->maxLength('timeapuesta', 255)
            ->allowEmptyString('timeapuesta');

        $validator
            ->scalar('contrasoplado')
            ->maxLength('contrasoplado', 255)
            ->allowEmptyString('contrasoplado');

        $validator
            ->scalar('soplado')
            ->maxLength('soplado', 255)
            ->allowEmptyString('soplado');

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
        $rules->add($rules->existsIn('quote_id', 'Quotes'), ['errorField' => 'quote_id']);
        $rules->add($rules->existsIn('client_id', 'Client'), ['errorField' => 'quote_id']);
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn('orderstatus_id', 'Orderstatuses'), ['errorField' => 'orderstatus_id']);
        $rules->add($rules->existsIn('machine_id', 'Machines'), ['errorField' => 'machine_id']);

        return $rules;
    }
}
