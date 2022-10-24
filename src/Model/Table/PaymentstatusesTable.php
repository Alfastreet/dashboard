<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Paymentstatuses Model
 *
 * @property \App\Model\Table\PaymentsTable&\Cake\ORM\Association\HasMany $Payments
 *
 * @method \App\Model\Entity\Paymentstatus newEmptyEntity()
 * @method \App\Model\Entity\Paymentstatus newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Paymentstatus[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Paymentstatus get($primaryKey, $options = [])
 * @method \App\Model\Entity\Paymentstatus findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Paymentstatus patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Paymentstatus[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Paymentstatus|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Paymentstatus saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Paymentstatus[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Paymentstatus[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Paymentstatus[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Paymentstatus[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PaymentstatusesTable extends Table
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

        $this->setTable('paymentstatuses');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Payments', [
            'foreignKey' => 'paymentstatus_id',
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
            ->scalar('paymentstatus')
            ->maxLength('paymentstatus', 255)
            ->requirePresence('paymentstatus', 'create')
            ->notEmptyString('paymentstatus');

        return $validator;
    }
}
