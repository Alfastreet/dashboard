<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Banks Model
 *
 * @property \App\Model\Table\PaymentinitialsTable&\Cake\ORM\Association\HasMany $Paymentinitials
 * @property \App\Model\Table\PaymentsTable&\Cake\ORM\Association\HasMany $Payments
 *
 * @method \App\Model\Entity\Bank newEmptyEntity()
 * @method \App\Model\Entity\Bank newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Bank[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Bank get($primaryKey, $options = [])
 * @method \App\Model\Entity\Bank findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Bank patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Bank[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Bank|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bank saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bank[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Bank[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Bank[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Bank[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class BanksTable extends Table
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

        $this->setTable('banks');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Paymentinitials', [
            'foreignKey' => 'bank_id',
        ]);
        $this->hasMany('Payments', [
            'foreignKey' => 'bank_id',
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
            ->scalar('numerocuenta')
            ->maxLength('numerocuenta', 255)
            ->requirePresence('numerocuenta', 'create')
            ->notEmptyString('numerocuenta');

        $validator
            ->scalar('razonsocial')
            ->maxLength('razonsocial', 255)
            ->requirePresence('razonsocial', 'create')
            ->notEmptyString('razonsocial');

        return $validator;
    }
}
