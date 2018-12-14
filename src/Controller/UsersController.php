<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class UsersController extends AppController {

    public function initialize() {

        parent::initialize();
        
        $this->Auth->allow(['register', 'login', 'logout']);
        $this->loadComponent('Recaptcha.Recaptcha');
        $this->loadComponent('UploadImage');
    }

    public function isAuthorized($user = null) {

        if($user['role'] == 'company') {
            
            if(in_array($this->request->getParam('action'), ['view', 'edit', 'delete'])) {

                return true;
            }
        }

        if($user['role'] == 'accounting') {
            
            if(in_array($this->request->getParam('action'), ['edit', 'delete'])) {

                return true;
            }
        }

        if($user['role'] == 'admin') {
            
            if(in_array($this->request->getParam('action'), ['index', 'view', 'delete', 'alterStatus'])) {

                return true;
            }
        }

        return false;
    }

    public function beforeRender(Event $event) {

        $actions = [
            'index',
            'view',
            'edit',
            'delete'
        ];

        if(in_array($this->request->action, $actions)) {

            $this->viewBuilder()->theme('AdminLTE');
            $this->viewBuilder()->setClassName('AdminLTE.AdminLTE');
        }
    }

    public function index() {
        
        $users = $this->paginate($this->Users, ['limit' => 20]);
        $this->set(compact('users'));
    }

    public function view($id = null) {
        
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        $this->set('user', $user);
    }

    public function login() {

        if($this->request->is('post')) {

            if($this->Recaptcha->verify()) {

                $user = $this->Auth->identify();

                if($user) {

                    $this->Auth->setUser($user);

                    if($user['role'] == 'admin') {

                        return $this->redirect(['controller' => 'users']);
                    }
                    else {

                        return $this->redirect(['controller' => 'users', 'action' => 'edit']);
                    }
                }
                else {

                    $this->Flash->error(__('Dados de usuário inválidos!'));
                    return $this->redirect(['controller' => 'users', 'action' => 'login']);
                }
            }
            else {

                $this->Flash->error(__('Erro ao validar recaptcha!'));
            }
        }
    }

    public function logout() {

        return $this->redirect($this->Auth->logout());
    }

    public function register() {
        
        $user = $this->Users->newEntity();

        if($this->request->is('post')) {
        
            if($this->Recaptcha->verify()) {
            
                $user = $this->Users->patchEntity($user, $this->request->getData());

                // Usuário ativo
                $user->status = 1;

                if($this->Users->save($user)) {
                    
                    $this->Flash->success(__('Conta de usuário criada com sucesso!'));

                    $user = $this->Auth->identify();
                    $this->Auth->setUser($user);

                    return $this->redirect(['action' => 'edit']);
                }

                $this->Flash->error(__('Erro ao salvar usuário! Tente novamente.'));
            }
            else {

                $this->Flash->error(__('Erro ao validar recaptcha!'));
            }
        }

        $this->set(compact('user'));
    }

    public function edit($id = null) {
        
        $id = $id ?? (int) $this->Auth->user('id');
        
        $user = $this->Users->get($id, [
            'contain' => ['Images', 'Phones']
        ]);

        if($this->request->is(['patch', 'post', 'put'])) {
            
            $config = [
                'dir'  => 'users',
                'type' => 'profile'
            ];
            
            $data = $this->UploadImage->save($this->request->getData(), $config);

            if(!($data)) {

                $this->Flash->error(__('Verifique o formato e tamanho da imagem!'));
                return $this->redirect(['action' => 'edit']); 
            }

            $user = $this->Users->patchEntity($user, $data, [
                'associated' => [
                    'Images', 
                    'Phones'
                ]
            ]);

            if($this->Users->save($user)) {

                $this->Flash->success(__('Usuário salvo com sucesso!'));
                return $this->redirect(['action' => 'edit']);
            }

            $this->Flash->error(__('Erro ao salvar usuário! Tente novamente.'));
        }

        $this->set(compact('user'));
    }

    public function delete($id = null) {

        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        
        if ($this->Users->delete($user)) {
            
            $this->Flash->success(__('The user has been deleted.'));
        } 
        else {
            
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function alterStatus($id = null) {

        if($this->request->is(['post', 'put'])) {
            
            if($id == null) {

                $this->Flash->error(__('Empresa/Contabilidade não encontrado!'));
            }
            else {

                $users = TableRegistry::get('Users');
                $user  = $users->get($id);

                $status = $user->status == 1 ? 0 : 1;

                $users->query()
                       ->update()
                       ->set(['status' => $status])
                       ->where(['id' => $id])
                       ->execute();
                
                $this->Flash->success(__('Empresa/Contabilidade atualizado com sucesso!'));
            }
            
            return $this->redirect(['controller' => 'users']);
        }
    }
}
