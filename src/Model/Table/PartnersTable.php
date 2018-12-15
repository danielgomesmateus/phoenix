<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Partners Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Partner get($primaryKey, $options = [])
 * @method \App\Model\Entity\Partner newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Partner[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Partner|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Partner|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Partner patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Partner[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Partner findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PartnersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('partners');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 35)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 15)
            ->requirePresence('phone', 'create')
            ->notEmpty('phone');

        $validator
            ->scalar('social_name')
            ->maxLength('social_name', 50)
            ->requirePresence('social_name', 'create')
            ->notEmpty('social_name');

        $validator
            ->scalar('cnpj')
            ->maxLength('cnpj', 18)
            ->requirePresence('cnpj', 'create')
            ->notEmpty('cnpj')
            ->add('cnpj', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('cep')
            ->maxLength('cep', 9)
            ->allowEmpty('cep');

        $validator
            ->scalar('address')
            ->maxLength('address', 100)
            ->allowEmpty('address');

        $validator
            ->integer('number')
            ->allowEmpty('number');

        $validator
            ->scalar('neighborhood')
            ->maxLength('neighborhood', 50)
            ->allowEmpty('neighborhood');

        $validator
            ->scalar('city')
            ->maxLength('city', 35)
            ->allowEmpty('city');

        $validator
            ->scalar('state')
            ->maxLength('state', 2)
            ->allowEmpty('state');

        $validator
            ->scalar('role')
            ->maxLength('role', 10)
            ->requirePresence('role', 'create')
            ->notEmpty('role');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['cnpj']));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
