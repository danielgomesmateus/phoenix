<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

class ClientsController extends AppController {

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
    
    public function index() {

        $this->paginate = [
            'contain' => ['Users'],
            'limit' => 20
        ];

        $clients = $this->Auth->user('role') != 'admin' ? $this->paginate($this->Clients->find('all', ['conditions' => ['user_id' => $this->Auth->user('id')]])) : $this->paginate($this->Clients->find('all')); 

        $this->set(compact('clients'));
    }

    public function view($id = null) {
        
        $client = $this->Clients->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('client', $client);
    }

    public function add() {

        $client = $this->Clients->newEntity();
        
        if($this->request->is('post')) {
            
            $client = $this->Clients->patchEntity($client, $this->request->getData());

            $client->status = 1;
            $client->user_id = $this->Auth->user('id');
            
            if ($this->Clients->save($client)) {
                
                $this->Flash->success(__('Cliente criado com sucesso!'));
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('Erro ao criar cliente! Tente novamente.'));
        }

        $users = $this->Clients->Users->find('list', ['limit' => 200]);
        $this->set(compact('client', 'users'));
    }

    public function edit($id = null) {

        $client = $this->Clients->get($id, [
            'contain' => []
        ]);
        
        if($this->request->is(['patch', 'post', 'put'])) {
            
            $client = $this->Clients->patchEntity($client, $this->request->getData());
            
            if ($this->Clients->save($client)) {
                
                $this->Flash->success(__('Cliente atualizado com sucesso!'));
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('Erro ao atualizar cliente! Tente novamente.'));
        }

        $users = $this->Clients->Users->find('list', ['limit' => 200]);
        $this->set(compact('client', 'users'));
    }

    public function delete($id = null) {
        
        $this->request->allowMethod(['post', 'delete']);
        $client = $this->Clients->get($id);
        
        if ($this->Clients->delete($client)) {
            
            $this->Flash->success(__('Cliente apagado com sucesso!'));
        } 
        else {
            
            $this->Flash->error(__('Erro ao apagar cliente! Tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function alterStatus($id = null) {

        if($this->request->is(['post', 'put'])) {
            
            if($id == null) {

                $this->Flash->error(__('Cliente não encontrado!'));
            }
            else {

                $clients = TableRegistry::get('Clients');
                $client  = $clients->get($id);

                $status = $client->status == 1 ? 0 : 1;

                $clients->query()
                       ->update()
                       ->set(['status' => $status])
                       ->where(['id' => $id])
                       ->execute();
                
                $this->Flash->success(__('Cliente atualizado com sucesso!'));
            }
            
            return $this->redirect(['controller' => 'clients']);
        }
    }
}
