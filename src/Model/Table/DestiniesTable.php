<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Destinies Model
 *
 * @property \App\Model\Table\PaymentinitialsTable&\Cake\ORM\Association\HasMany $Paymentinitials
 * @property \App\Model\Table\PaymentsTable&\Cake\ORM\Association\HasMany $Payments
 *
 * @method \App\Model\Entity\Destiny newEmptyEntity()
 * @method \App\Model\Entity\Destiny newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Destiny[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Destiny get($primaryKey, $options = [])
 * @method \App\Model\Entity\Destiny findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Destiny patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Destiny[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Destiny|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Destiny saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Destiny[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Destiny[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Destiny[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Destiny[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class DestiniesTable extends Table
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

        $this->setTable('destinies');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Paymentinitials', [
            'foreignKey' => 'destiny_id',
        ]);
        $this->hasMany('Payments', [
            'foreignKey' => 'destiny_id',
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
