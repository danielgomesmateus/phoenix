<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Utility\Text;
use Cake\ORM\TableRegistry;

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

        $pages = $this->paginate($this->Pages, ['limit' => 20]);
        $this->set(compact('pages'));
    }

    public function view($slug = null) {

        $page = $this->Pages->find()->select(['title', 'content'])->where(['slug' => $slug, 'status' => 1])->toArray();

        if(is_array($page) && count($page) >= 1) {

            $this->set('page', $page);
        }
        else {

            $this->Flash->error(__('Página não encontrada!'));
            $this->redirect(['controller' => 'home']);
        }
    }

    public function add() {

        $page = $this->Pages->newEntity();
        
        if($this->request->is('post')) {
            
            $page = $this->Pages->patchEntity($page, $this->request->getData());

            $page->status = 1;
            $page->slug = strtolower(Text::slug(strip_tags($page->title)));
            
            if($this->Pages->save($page)) {
                
                $this->Flash->success(__('Página salva com sucesso!'));
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('Erro ao salvar página! Tente novamente.'));
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
                
                $this->Flash->success(__('Página atualizada com sucesso!'));
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('Erro ao atualizar página! Tente novamente.'));
        }

        $this->set(compact('page'));
    }

    public function delete($id = null) {

        $this->request->allowMethod(['post', 'delete']);
        $page = $this->Pages->get($id);
        
        if ($this->Pages->delete($page)) {
            
            $this->Flash->success(__('Página atualizada com sucesso!'));
        } 
        else {
            
            $this->Flash->error(__('Erro ao atualizar página! Tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function alterStatus($id = null) {

        if($this->request->is(['post', 'put'])) {
            
            if($id == null) {

                $this->Flash->error(__('Página não encontrada!'));
            }
            else {

                $pages = TableRegistry::get('Pages');
                $page  = $pages->get($id);

                $status = $page->status == 1 ? 0 : 1;

                $pages->query()
                       ->update()
                       ->set(['status' => $status])
                       ->where(['id' => $id])
                       ->execute();
                
                $this->Flash->success(__('Página atualizada com sucesso!'));
            }
            
            return $this->redirect(['controller' => 'pages']);
        }
    }
}
