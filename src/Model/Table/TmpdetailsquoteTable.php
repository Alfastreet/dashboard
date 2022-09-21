<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tmpdetailsquote Model
 *
 * @property \App\Model\Table\TypeProductsTable&\Cake\ORM\Association\BelongsTo $TypeProducts
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 *
 * @method \App\Model\Entity\Tmpdetailsquote newEmptyEntity()
 * @method \App\Model\Entity\Tmpdetailsquote newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Tmpdetailsquote[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tmpdetailsquote get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tmpdetailsquote findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Tmpdetailsquote patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tmpdetailsquote[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tmpdetailsquote|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tmpdetailsquote saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tmpdetailsquote[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tmpdetailsquote[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tmpdetailsquote[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tmpdetailsquote[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TmpdetailsquoteTable extends Table
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

        $this->setTable('tmpdetailsquote');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('TypeProduct', [
            'foreignKey' => 'typeProduct_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Parts', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Money', [
            'foreignKey' => 'money_id',
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
            ->integer('typeProduct_id')
            ->requirePresence('typeProduct_id', 'create')
            ->notEmptyString('typeProduct_id');

        $validator
            ->integer('product_id')
            ->requirePresence('product_id', 'create')
            ->notEmptyString('product_id');

        $validator
            ->integer('amount')
            ->requirePresence('amount', 'create')
            ->notEmptyString('amount');

        $validator
            ->integer('money_id')
            ->requirePresence('money_id', 'create')
            ->notEmptyString('money_id');

        $validator
            ->scalar('value')
            ->maxLength('value', 255)
            ->requirePresence('value', 'create')
            ->notEmptyString('value');

        $validator
            ->scalar('token')
            ->maxLength('token', 255)
            ->requirePresence('token', 'create')
            ->notEmptyString('token');
            

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
        $rules->add($rules->existsIn('typeProduct_id', 'TypeProduct'), ['errorField' => 'typeProduct_id']);
        $rules->add($rules->existsIn('product_id', 'Parts'), ['errorField' => 'product_id']);

        return $rules;
    }
}
