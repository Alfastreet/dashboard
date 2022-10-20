<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Agreementstatuses Model
 *
 * @property \App\Model\Table\AgreementsTable&\Cake\ORM\Association\HasMany $Agreements
 *
 * @method \App\Model\Entity\Agreementstatus newEmptyEntity()
 * @method \App\Model\Entity\Agreementstatus newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Agreementstatus[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Agreementstatus get($primaryKey, $options = [])
 * @method \App\Model\Entity\Agreementstatus findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Agreementstatus patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Agreementstatus[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Agreementstatus|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Agreementstatus saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Agreementstatus[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Agreementstatus[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Agreementstatus[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Agreementstatus[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class AgreementstatusesTable extends Table
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

        $this->setTable('agreementstatuses');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Agreements', [
            'foreignKey' => 'agreementstatus_id',
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
            ->scalar('status')
            ->maxLength('status', 255)
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        return $validator;
    }
}
