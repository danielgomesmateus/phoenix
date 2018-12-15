<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

class PartnersController extends AppController {

    public function initialize() {

        parent::initialize();
    }

    public function isAuthorized($user = null) {

        if($user['role'] == 'company') {
            
            if(in_array($this->request->getParam('action'), ['index', 'add', 'view', 'edit', 'delete', 'alterStatus'])) {

                return true;
            }
        }

        if($user['role'] == 'admin') {
            
            if(in_array($this->request->getParam('action'), ['index', 'add', 'view', 'edit', 'delete', 'alterStatus'])) {

                return true;
            }
        }

        return false;
    }

    public function beforeRender(Event $event) {

        $actions = [
            'index',
            'add',
            'view',
            'edit',
            'delete'
        ];

        if(in_array($this->request->action, $actions)) {

            $this->viewBuilder()->theme('AdminLTE');
            $this->viewBuilder()->setClassName('AdminLTE.AdminLTE');
        }
    }
    
    public function index($option = null) {

        $options = [
            'client',
            'provider'
        ];

        if(!(in_array($option, $options))) {

            $this->Flash->error(__('Erro ao processar solicitação! Tente novamente.'));
            return $this->redirect(['action' => 'index', 'client']);
        }

        
        $this->paginate = [
            'contain' => ['Users'],
            'limit' => 20
        ];

        $partners = $this->Auth->user('role') != 'admin' ? $this->paginate($this->Partners->find('all', ['conditions' => ['Partners.role' => $option, 'user_id' => $this->Auth->user('id')]])) : $this->paginate($this->Partners->find('all', ['conditions' => ['Partners.role' => $option]])); 

        $this->set(compact('partners', 'option'));
    }

    public function view($id = null) {
        
        $partner = $this->Partners->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('partner', $partner);
    }

    public function add($option = null) {

        $partner = $this->Partners->newEntity();
        
        if($this->request->is('post')) {
            
            $partner = $this->Partners->patchEntity($partner, $this->request->getData());

            $partner->status = 1;
            $partner->user_id = $this->Auth->user('id');

            $options = [
                'client',
                'provider'
            ];

            if(!(in_array($option, $options))) {

                $this->Flash->error(__('Erro ao criar usuário! Tente novamente.'));
                return $this->redirect(['action' => 'index', $option]);
            }
            
            $partner->role = $option;

            if($this->Partners->save($partner)) {
                
                $this->Flash->success(__('Usuário criado com sucesso!'));
                return $this->redirect(['action' => 'index', $option]);
            }

            $this->Flash->error(__('Erro ao criar usuário! Tente novamente.'));
            return $this->redirect(['action' => 'index', $option]);
        }

        $users = $this->Partners->Users->find('list', ['limit' => 200]);
        $this->set(compact('partner', 'users', 'option'));
    }

    public function edit($id = null) {

        $partner = $this->Partners->get($id, [
            'contain' => []
        ]);
        
        if($this->request->is(['patch', 'post', 'put'])) {
            
            $partner = $this->Partners->patchEntity($partner, $this->request->getData());
            
            if ($this->Partners->save($partner)) {
                
                $this->Flash->success(__('Usuário atualizado com sucesso!'));
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('Erro ao atualizar usuário! Tente novamente.'));
        }

        $users = $this->Partners->Users->find('list', ['limit' => 200]);
        $this->set(compact('partner', 'users'));
    }

    public function delete($id = null) {
        
        $this->request->allowMethod(['post', 'delete']);
        $partner = $this->Partners->get($id);
        
        if ($this->Partners->delete($partner)) {
            
            $this->Flash->success(__('Usuário apagado com sucesso!'));
        } 
        else {
            
            $this->Flash->error(__('Erro ao apagar usuário! Tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function alterStatus($id = null) {

        if($this->request->is(['post', 'put'])) {
            
            if($id == null) {

                $this->Flash->error(__('Usuário não encontrado!'));
            }
            else {

                $partners = TableRegistry::get('Partners');
                $partner  = $partners->get($id);

                $status = $partner->status == 1 ? 0 : 1;

                $partners->query()
                       ->update()
                       ->set(['status' => $status])
                       ->where(['id' => $id])
                       ->execute();
                
                $this->Flash->success(__('Usuário atualizado com sucesso!'));
            }
            
            return $this->redirect(['controller' => 'partners']);
        }
    }
}
