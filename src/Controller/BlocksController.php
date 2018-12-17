<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

class BlocksController extends AppController {

    public function initialize() {

        parent::initialize();
    }

    public function isAuthorized($user = null) {

        if($user['role'] == 'admin') {
            
            return true;
        }

        return false;
    }

    public function beforeRender(Event $event) {

        $actions = [
            'index',
            'add',
            'edit',
            'delete'
        ];

        if(in_array($this->request->action, $actions)) {

            $this->viewBuilder()->theme('AdminLTE');
            $this->viewBuilder()->setClassName('AdminLTE.AdminLTE');
        }
    }

    public function index() {

        $blocks = $this->paginate($this->Blocks);
        $this->set(compact('blocks'));
    }

    public function add() {

        $block = $this->Blocks->newEntity();
        
        if($this->request->is('post')) {
            
            $block = $this->Blocks->patchEntity($block, $this->request->getData());

            $block->status = 1;
            
            if($this->Blocks->save($block)) {
                
                $this->Flash->success(__('Bloco salvo com sucesso!'));
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('Erro ao salvar bloco! Tente novamente.'));
        }

        $this->set(compact('block'));
    }

    public function edit($id = null) {

        $block = $this->Blocks->get($id, [
            'contain' => []
        ]);
        if($this->request->is(['patch', 'post', 'put'])) {
            
            $block = $this->Blocks->patchEntity($block, $this->request->getData());
            
            if($this->Blocks->save($block)) {
                
                $this->Flash->success(__('Bloco salvo com sucesso!'));
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('Erro ao salvar bloco! Tente novamente.'));
        }

        $this->set(compact('block'));
    }

    public function delete($id = null) {

        $this->request->allowMethod(['post', 'delete']);
        $block = $this->Blocks->get($id);
        
        if($this->Blocks->delete($block)) {
            
            $this->Flash->success(__('Bloco apagado com sucesso!'));
        } 
        else {
            
            $this->Flash->error(__('Erro ao apagar bloco! Tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function alterStatus($id = null) {

        if($this->request->is(['post', 'put'])) {
            
            if($id == null) {

                $this->Flash->error(__('Bloco não encontrado!'));
            }
            else {

                $blocks = TableRegistry::get('Blocks');
                $block  = $blocks->get($id);

                $status = $block->status == 1 ? 0 : 1;

                $blocks->query()
                       ->update()
                       ->set(['status' => $status])
                       ->where(['id' => $id])
                       ->execute();
                
                $this->Flash->success(__('Bloco atualizado com sucesso!'));
            }
            
            return $this->redirect(['controller' => 'blocks']);
        }
    }
}
