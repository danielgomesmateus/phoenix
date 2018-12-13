<?php
namespace App\Controller;
use App\Controller\AppController;

class UsersController extends AppController {

    public function initialize() {

        parent::initialize();
        
        $this->Auth->allow(['register']);
        $this->loadComponent('Recaptcha.Recaptcha');
    }

    public function index() {
        
        $users = $this->paginate($this->Users);
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
                    return $this->redirect(['controller' => 'home']);
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

                // Usuário ativo do tipo user
                $user->status = 1;
                $user->role   = 'user';

                if($this->Users->save($user)) {
                    
                    $this->Flash->success(__('Conta de usuário criada com sucesso!'));
                    return $this->redirect(['action' => 'login']);
                }

                $this->Flash->error(__('Erro ao salvar usuário! Tente novamente.'));
            }
            else {

                $this->Flash->error(__('Erro ao validar recaptcha!'));
            }
        }

        $this->set(compact('user'));
    }

    public function edit($id = null) 
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        if($this->request->is(['patch', 'post', 'put'])) {
            
            $user = $this->Users->patchEntity($user, $this->request->getData());
            
            if($this->Users->save($user)) {

                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The user could not be saved. Please, try again.'));
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
}
