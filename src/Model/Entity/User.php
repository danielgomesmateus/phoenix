<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $social_name
 * @property string|null $fantasy_name
 * @property string|null $cnpj
 * @property string|null $cep
 * @property string|null $address
 * @property int|null $number
 * @property string|null $neighborhood
 * @property string|null $city
 * @property string|null $state
 * @property string|null $municipal_registration
 * @property string|null $state_registration
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $role
 * @property int $status
 *
 * @property \App\Model\Entity\Client[] $clients
 * @property \App\Model\Entity\Phone[] $phones
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'email' => true,
        'password' => true,
        'social_name' => true,
        'fantasy_name' => true,
        'cnpj' => true,
        'cep' => true,
        'address' => true,
        'number' => true,
        'neighborhood' => true,
        'city' => true,
        'state' => true,
        'municipal_registration' => true,
        'state_registration' => true,
        'created' => true,
        'modified' => true,
        'role' => true,
        'status' => true,
        'clients' => true,
        'phones' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    protected function _setPassword($password) {

        return (new DefaultPasswordHasher)->hash($password);
    }
}
