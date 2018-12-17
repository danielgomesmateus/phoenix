<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

class BannersController extends AppController {

    public function initialize() {

        parent::initialize();

        $this->loadComponent('UploadImage');
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
        
        $banners = $this->paginate($this->Banners);
        $this->set(compact('banners'));
    }

    public function add() {

        $banner = $this->Banners->newEntity();
        
        if($this->request->is('post')) {

            $config = [
                'dir'   => 'banners',
                'type'  => 'slide'
            ];
            
            $data = $this->UploadImage->Banners($this->request->getData(), $config);

            if(!($data)) {

                $this->Flash->error(__('Verifique o formato e tamanho da imagem!'));
                return $this->redirect(['action' => 'edit']); 
            }
            
            $banner = $this->Banners->patchEntity($banner, $data);        
            $banner->status = 1;
            
            if($this->Banners->save($banner)) {
                
                $this->Flash->success(__('Banner salvo com sucesso!'));
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('Erro ao salvar banner! Tente novamente.'));
        }

        $this->set(compact('banner'));
    }

    public function edit($id = null) 
    {
        $banner = $this->Banners->get($id, [
            'contain' => []
        ]);

        if($this->request->is(['patch', 'post', 'put'])) {
            
            if(!(empty($this->request->getData()['image']['tmp_name']))) {
                
                $config = [
                    'dir'   => 'banners',
                    'type'  => 'slide'
                ];
                
                $data = $this->UploadImage->Banners($this->request->getData(), $config);
    
                if(!($data)) {
    
                    $this->Flash->error(__('Verifique o formato e tamanho da imagem!'));
                    return $this->redirect(['action' => 'edit']); 
                }
            }
            else {

                $data = $this->request->getData();
                unset($data['image']);
                $data['image'] = $banner['image'];
            }

            $banner = $this->Banners->patchEntity($banner, $data);
            
            if($this->Banners->save($banner)) {
                
                $this->Flash->success(__('Banner atualizado com sucesso!'));
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('Erro ao atualizar banner! Tente novamente.'));
        }

        $this->set(compact('banner'));
    }

    public function delete($id = null) {
        
        $this->request->allowMethod(['post', 'delete']);
        $banner = $this->Banners->get($id);
        
        if($this->Banners->delete($banner)) {
            
            $this->Flash->success(__('Banner apagado com sucesso!'));
        } 
        else {
            
            $this->Flash->error(__('Erro ao apagar banner! Tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function alterStatus($id = null) {

        if($this->request->is(['post', 'put'])) {
            
            if($id == null) {

                $this->Flash->error(__('Banner não encontrado!'));
            }
            else {

                $banners = TableRegistry::get('Banners');
                $banner  = $banners->get($id);

                $status = $banner->status == 1 ? 0 : 1;

                $banners->query()
                       ->update()
                       ->set(['status' => $status])
                       ->where(['id' => $id])
                       ->execute();
                
                $this->Flash->success(__('Banner atualizado com sucesso!'));
            }
            
            return $this->redirect(['controller' => 'banners']);
        }
    }
}
