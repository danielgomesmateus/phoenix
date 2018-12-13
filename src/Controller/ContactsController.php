<?php
namespace App\Controller;

use App\Controller\AppController;

class ContactsController extends AppController
{

    public function initialize() {

        parent::initialize();
        $this->Auth->allow(['add']);
    }

    public function index() {
        
        $contacts = $this->paginate($this->Contacts);
        $this->set(compact('contacts'));
    }

    public function view($id = null) {
        
        $contact = $this->Contacts->get($id, [
            'contain' => []
        ]);
        $this->set('contact', $contact);
    }

    public function add() {

        $contact = $this->Contacts->newEntity();
        if($this->request->is('post')) {
            
            $contact = $this->Contacts->patchEntity($contact, $this->request->getData());
            
            if($this->Contacts->save($contact)) {

                $this->Flash->success(__('The contact has been saved.'));
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The contact could not be saved. Please, try again.'));
        }

        $this->set(compact('contact'));
    }
    
    public function delete($id = null) {
        
        $this->request->allowMethod(['post', 'delete']);
        $contact = $this->Contacts->get($id);
        
        if($this->Contacts->delete($contact)) {
            
            $this->Flash->success(__('The contact has been deleted.'));
        } 
        else {
            
            $this->Flash->error(__('The contact could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
