<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Setting Entity
 *
 * @property int $id
 * @property string $name
 * @property string|null $logo
 * @property string|null $favicon
 * @property string|null $description
 * @property string|null $author
 * @property string|null $keywords
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $facebook
 * @property string|null $twitter
 * @property string|null $instagram
 * @property string|null $youtube
 * @property string|null $google+
 * @property string|null $linkedin
 * @property \Cake\I18n\FrozenTime $modified
 */
class Setting extends Entity
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
        'logo' => true,
        'favicon' => true,
        'description' => true,
        'author' => true,
        'keywords' => true,
        'phone' => true,
        'email' => true,
        'facebook' => true,
        'twitter' => true,
        'instagram' => true,
        'youtube' => true,
        'google+' => true,
        'linkedin' => true,
        'modified' => true
    ];
}
