<?php
namespace App\Controller;

use App\Controller\AppController;

class PagesController extends AppController {

    public function initialize() {

        parent::initialize();
        
        $this->Auth->allow('view');
    }

    public function isAuthorized($user = null) {

        if($user['role'] == 'admin') {
            
            return true;
        }

        return false;
    }

    public function index() {

        $pages = $this->paginate($this->Pages);
        $this->set(compact('pages'));
    }

    public function view($id = null) {

        $page = $this->Pages->get($id, [
            'contain' => []
        ]);
        $this->set('page', $page);
    }

    public function add() {

        $page = $this->Pages->newEntity();
        
        if($this->request->is('post')) {
            
            $page = $this->Pages->patchEntity($page, $this->request->getData());
            
            if($this->Pages->save($page)) {
                
                $this->Flash->success(__('The page has been saved.'));
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The page could not be saved. Please, try again.'));
        }

        $this->set(compact('page'));
    }

    public function edit($id = null) {

        $page = $this->Pages->get($id, [
            'contain' => []
        ]);

        if($this->request->is(['patch', 'post', 'put'])) {
            
            $page = $this->Pages->patchEntity($page, $this->request->getData());
            
            if($this->Pages->save($page)) {
                
                $this->Flash->success(__('The page has been saved.'));
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The page could not be saved. Please, try again.'));
        }

        $this->set(compact('page'));
    }

    public function delete($id = null) {

        $this->request->allowMethod(['post', 'delete']);
        $page = $this->Pages->get($id);
        
        if ($this->Pages->delete($page)) {
            
            $this->Flash->success(__('The page has been deleted.'));
        } 
        else {
            
            $this->Flash->error(__('The page could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
