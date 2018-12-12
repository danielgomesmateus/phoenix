<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Settings Model
 *
 * @method \App\Model\Entity\Setting get($primaryKey, $options = [])
 * @method \App\Model\Entity\Setting newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Setting[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Setting|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Setting|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Setting patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Setting[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Setting findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SettingsTable extends Table
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

        $this->setTable('settings');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('logo')
            ->maxLength('logo', 150)
            ->allowEmpty('logo');

        $validator
            ->scalar('favicon')
            ->maxLength('favicon', 150)
            ->allowEmpty('favicon');

        $validator
            ->scalar('description')
            ->maxLength('description', 150)
            ->allowEmpty('description');

        $validator
            ->scalar('author')
            ->maxLength('author', 35)
            ->allowEmpty('author');

        $validator
            ->scalar('keywords')
            ->maxLength('keywords', 150)
            ->allowEmpty('keywords');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 14)
            ->allowEmpty('phone');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->scalar('facebook')
            ->maxLength('facebook', 100)
            ->allowEmpty('facebook');

        $validator
            ->scalar('twitter')
            ->maxLength('twitter', 100)
            ->allowEmpty('twitter');

        $validator
            ->scalar('instagram')
            ->maxLength('instagram', 100)
            ->allowEmpty('instagram');

        $validator
            ->scalar('youtube')
            ->maxLength('youtube', 100)
            ->allowEmpty('youtube');

        $validator
            ->scalar('google+')
            ->maxLength('google+', 100)
            ->allowEmpty('google+');

        $validator
            ->scalar('linkedin')
            ->maxLength('linkedin', 100)
            ->allowEmpty('linkedin');

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
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
