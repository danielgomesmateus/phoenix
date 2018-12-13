<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class ClientsController extends AppController {

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

        $clients = $this->paginate($this->Clients->find('all', ['user_id' => $this->Auth->user('id')]));
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
                
                $this->Flash->success(__('The client has been saved.'));
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The client could not be saved. Please, try again.'));
        }

        $users = $this->Clients->Users->find('list', ['limit' => 200]);
        $this->set(compact('client', 'users'));
    }

    public function delete($id = null) {
        
        $this->request->allowMethod(['post', 'delete']);
        $client = $this->Clients->get($id);
        
        if ($this->Clients->delete($client)) {
            
            $this->Flash->success(__('The client has been deleted.'));
        } 
        else {
            
            $this->Flash->error(__('The client could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
