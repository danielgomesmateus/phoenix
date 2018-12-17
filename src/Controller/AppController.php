<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize() {

        parent::initialize();

        $this->loadComponent('Auth', [
            'authError' => 'Você não tem permissão para acessar esta página!',
            'authenticate' => [
                'Form' => [
                    'userModel' => 'Users',
                    'finder' => 'auth',
                    'fields' => [
                        'username' => 'email'
                    ]
                ]
            ],
            'authorize' => 'Controller'
        ]);
        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');

        $pages = TableRegistry::get('Pages')->find()->select(['title', 'slug'])->where(['status' => 1])->toArray();
        $this->set('pages', $pages);

        $blocks = TableRegistry::get('Blocks')->find()->select(['title', 'content'])->where(['status' => 1])->toArray();
        $this->set('blocks', $blocks);    
        
        if($this->Auth->user()) {

            $images = TableRegistry::get('Images');
            $image  = $images->find()->select(['image'])->where(['type' => 'profile', 'status' => 1, 'user_id' => $this->Auth->user('id')])->toArray();

            $data['name']    = $this->Auth->user('name');
            $data['email']   = $this->Auth->user('email');
            $data['created'] = $this->Auth->user('created');
            $data['role']    = $this->Auth->user('role');

            if(isset($image[0]['image'])) {
                
                $data['image']   = $image[0]['image'];
            }

            $this->set('userData', $data);
        }

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
    }
}
