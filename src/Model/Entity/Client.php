<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Client Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $phone
 * @property string $social_name
 * @property string $cnpj
 * @property string|null $cep
 * @property string|null $address
 * @property int|null $number
 * @property string|null $neighborhood
 * @property string|null $city
 * @property string|null $state
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $status
 *
 * @property \App\Model\Entity\User $user
 */
class Client extends Entity
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
        'user_id' => true,
        'name' => true,
        'phone' => true,
        'social_name' => true,
        'cnpj' => true,
        'cep' => true,
        'address' => true,
        'number' => true,
        'neighborhood' => true,
        'city' => true,
        'state' => true,
        'created' => true,
        'modified' => true,
        'status' => true,
        'user' => true
    ];
}
